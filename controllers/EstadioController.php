<?php

namespace app\controllers;

use Yii;
use app\models\Estadio;
use app\models\searchs\EstadioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EstadioController implements the CRUD actions for Estadio model.
 */
class EstadioController extends Controller
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
     * Lists all Estadio models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EstadioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Estadio model.
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
     * Creates a new Estadio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Estadio();

            if ($model->load(Yii::$app->request->post())) {
                $model->file = \yii\web\UploadedFile::getInstance($model, 'file');
                if($model->file){
                    $imagepath = 'uploads/estadio/';
                    $model->est_imagen = $imagepath.rand(10,100).'_'.$model->file->name;
                }
                
                if( $model->save()){
                    if($model->file){
                        $model->file->saveAs($model->est_imagen);
                    }
                    Yii::$app->session->setFlash('success', Yii::t('app', 'Created ').$model->est_nombre);
                    return $this->redirect(['create']);
                }

            }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Estadio model.
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
                    $imagepath = 'uploads/estadio/';
                    $model->est_imagen = $imagepath.rand(10,100).'_'.$model->file->name;
                }
                
                if($model->save()){
                    
                    if($model->file){
                        $model->file->saveAs($model->est_imagen);
                    }
                    Yii::$app->session->setFlash('warning', Yii::t('app', 'Updated ').$model->est_nombre);
                    return $this->redirect(['index']);
                }

            }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Estadio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $nombre = $this->findModel($id)->est_nombre;
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('error', Yii::t('app', 'Deleted ') . $nombre);
        return $this->redirect(['index']);
    }
    
    public function actionDeletefoto($id){
        $foto = Estadio::find()->where(['est_id'=>$id])->one()->est_imagen;
        if($foto){
            if(!unlink($foto)){
                return false;
            }
        }
        $imagen = Estadio::findOne($id);
        $imagen->est_imagen = null;
        $imagen->update();
        
        return $this->redirect(['update', 'id' => $id]);
        
    }

    /**
     * Finds the Estadio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Estadio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Estadio::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
