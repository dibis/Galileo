<?php

namespace app\controllers;

use Yii;
use app\models\Pais;
use app\models\searchs\PaisSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PaisController implements the CRUD actions for Pais model.
 */
class PaisController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
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
     * Lists all Pais models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PaisSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pais model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pais model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pais();

            if ($model->load(Yii::$app->request->post())) {
                $model->file = \yii\web\UploadedFile::getInstance($model, 'file');
                if($model->file){
                    $imagepath = 'uploads/country/';
                    $model->pai_bandera = $imagepath.rand(10,100).$model->file->name;
                }
                
                if( $model->save()){
                    if($model->file){
                        $model->file->saveAs($model->pai_bandera);
                    }
                    Yii::$app->session->setFlash('success', Yii::t('app', 'Created ').$model->pai_nombre);
                    return $this->redirect(['create']);
                }

            }

            return $this->render('create', [
                        'model' => $model,
            ]);
    }

    /**
     * Updates an existing Pais model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post())) {
                
                $model->file = \yii\web\UploadedFile::getInstance($model, 'file');
                if($model->file){
                    $imagepath = 'uploads/country/';
                    $model->pai_bandera = $imagepath.rand(10,100).$model->file->name;
                }
                
                if($model->save()){
                    
                    if($model->file){
                        $model->file->saveAs($model->pai_bandera);
                    }
                    Yii::$app->session->setFlash('warning', Yii::t('app', 'Updated ').$model->pai_nombre);
                    return $this->redirect(['index']);
                }

            }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pais model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
            $nombre = $this->findModel($id)->pai_nombre;
            $this->findModel($id)->delete();
            Yii::$app->session->setFlash('error', Yii::t('app', 'Deleted ').$nombre);
            return $this->redirect(['index']);
    }

    public function actionDeletefoto($id){
        $foto = Pais::find()->where(['pai_id'=>$id])->one()->pai_bandera;
        if($foto){
            if(!unlink($foto)){
                return false;
            }
        }
        $imagen = Pais::findOne($id);
        $imagen->pai_bandera = null;
        $imagen->update();
        
        return $this->redirect(['update', 'id' => $id]);
        
    }
    
    /**
     * Finds the Pais model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pais the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pais::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
