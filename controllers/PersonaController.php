<?php

namespace app\controllers;

use Yii;
use app\models\Persona;
use app\models\searchs\PersonaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PersonaController implements the CRUD actions for Persona model.
 */
class PersonaController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Persona models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PersonaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Persona model.
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
     * Creates a new Persona model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Persona();

        if ($model->load(Yii::$app->request->post())) {
            $model->file = \yii\web\UploadedFile::getInstance($model, 'file');
            if ($model->file) {
                $imagepath = 'uploads/persona/';
                $model->per_imagengeneral = $imagepath . rand(10, 100) . '_' . $model->file->name;
            }

            $date = $model->per_fechanacim;
            $model->per_fechanacim = date('Y-m-d', strtotime($date));

            if ($model->save()) {
                if ($model->file) {
                    $model->file->saveAs($model->per_imagengeneral);
                }
                Yii::$app->session->setFlash('success', Yii::t('app', 'Created ') . $model->per_nombre);
                return $this->redirect(['create']);
            }
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Persona model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        $date = $model->per_fechanacim;
        $model->per_fechanacim = date('d-m-Y', strtotime($date));

        if ($model->load(Yii::$app->request->post())) {

            $model->file = \yii\web\UploadedFile::getInstance($model, 'file');
            if ($model->file) {
                $imagepath = 'uploads/persona/';
                $model->per_imagengeneral = $imagepath . rand(10, 100) . '_' . $model->file->name;
            }
            
            $date = $model->per_fechanacim;
            $model->per_fechanacim = date('Y-m-d', strtotime($date));

            if ($model->save()) {

                if ($model->file) {
                    $model->file->saveAs($model->per_imagengeneral);
                }
                Yii::$app->session->setFlash('warning', Yii::t('app', 'Updated ') . $model->per_nombre);
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Persona model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $nombre = $this->findModel($id)->per_nombre;
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('error', Yii::t('app', 'Deleted ') . $nombre);
        return $this->redirect(['index']);
    }

    public function actionDeletefoto($id) {
        $foto = Persona::find()->where(['per_id' => $id])->one()->per_imagengeneral;
        if ($foto) {
            if (!unlink($foto)) {
                return false;
            }
        }
        $imagen = Persona::findOne($id);
        $imagen->per_imagengeneral = null;
        $imagen->update();

        return $this->redirect(['update', 'id' => $id]);
    }

    /**
     * Finds the Persona model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Persona the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Persona::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
