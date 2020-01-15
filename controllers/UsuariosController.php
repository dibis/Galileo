<?php

namespace app\controllers;

use Yii;
use app\models\usuarios;
use app\models\searchs\UsuariosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\SignupForm;
use yii\web\UploadedFile;
use app\helpers\UserHelper;
use yii\base\UserException;

/**
 * UsuariosController implements the CRUD actions for usuarios model.
 */
class UsuariosController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index', 'create', 'update', 'view', 'delete', 'change', 'permisos'],
                'rules' => [
                    // allow authenticated users
                    [
                        'allow' => true,
                        'actions' => ['index', 'create', 'update', 'view', 'delete', 'change', 'permisos'],
                        'roles' => ['superadmin'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update'],
                        'roles' => ['admin', 'editor', 'user'],
                    ],
                // everything else is denied
                ],
            ],
        ];
    }

    /**
     * Lists all usuarios models.
     */
    public function actionIndex() {
        $searchModel = new UsuariosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single usuarios model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new usuarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()) {
                    return $this->redirect(['index']);
                }
            }
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing usuarios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {


        $model = $this->findModel($id);
        $image = $model->image;
        
        $identity = Yii::$app->user->identity->id;
        $niveles = new UserHelper();
        $nivel = $niveles->nivelUsuario($identity);
        
        if($nivel > 1){
            if($id <> $identity){
                 throw new UserException(Yii::t('app', 'Insufficient permissions for this action'));
            }
        }
        

        if ($model->load(Yii::$app->request->post())) {

            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->file) {
                $imagepath = 'uploads/users/';
                $model->image = $imagepath . rand(10, 100) . $model->file->name;
            }
            //Eliminar la imagen si se ha cambiado
            if ($model->save()) {

                if ($model->file) {

                    $model->file->saveAs($model->image);

                    if ($model->image != $image && $image != null && !empty($image) 
                            && file_exists(Yii::$app->request->BaseUrl . '/' . $image)) {
                        unlink(Yii::$app->request->BaseUrl . '/' . $model->image);
                    }
                }
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
                    'model' => $model,
                    'nivel' => $nivel,
                    'identity' => $identity,
        ]);
    }

    public function actionChange($id) {

        //$password;

        $user = \app\models\Usuarios::findIdentity($id);


        if ($user->load(Yii::$app->request->post())) {

            if ($user->resetPassword($user->password)) {

                return $this->redirect(['index']);
            } else {

                return $this->render('change', [
                            'user' => $user,
                ]);
            }
        }

        return $this->render('change', [
                    'user' => $user,
        ]);
    }

    public function actionPermisos($id) {

        if (($model = \app\models\AuthAssignment::findOne(['user_id' => $id])) !== null) {

            $model = $this->findModelPermisos($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {

                return $this->redirect(['index']);
            }

            return $this->render('createpermisos', [
                        'model' => $model,
            ]);
        } else {

            $model = new \app\models\AuthAssignment();
            $model->user_id = $id;

            if ($model->load(Yii::$app->request->post()) && $model->save()) {

                return $this->redirect(['index']);
            }

            return $this->render('createpermisos', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {

        $model = $this->findModel($id);
        $image = $model->image;

        if ($image != null && !empty($image) 
                && file_exists(Yii::$app->request->BaseUrl . '/' . $image)) {
            unlink(Yii::$app->request->BaseUrl . '/' . $model->image);
        }

        $this->findModel($id)->delete();
        
        return $this->redirect(['index']);
    }

    /**
     * @param integer $id
     * @return usuarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {

        if (($model = usuarios::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    
    protected function findModelPermisos($user_id) {

        if (($model = \app\models\AuthAssignment::findOne(['user_id' => $user_id])) !== null) {
            return $model;
        } else {
            return false;
        }
    }

    
    public function actionDeletefoto($id) {
        $foto = Usuarios::find()->where(['id' => $id])->one()->image;
        if ($foto) {
            if (!unlink($foto)) {
                return false;
            }
        }
        $usuario = Usuarios::findOne($id);
        $usuario->image = null;
        $usuario->update();

        return $this->redirect(['update', 'id' => $id]);
    }

}
