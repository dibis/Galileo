<?php

namespace app\controllers;

use Yii;
use app\models\Datosclub;
use app\models\searchs\DatosclubSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DatosclubController implements the CRUD actions for Datosclub model.
 */
class DatosclubController extends Controller
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
     * Lists all Datosclub models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DatosclubSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Datosclub model.
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
     * Creates a new Datosclub model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Datosclub();

            if ($model->load(Yii::$app->request->post())) {
                $model->file = \yii\web\UploadedFile::getInstance($model, 'file');
                if($model->file){
                    $imagepath = 'uploads/camiseta/';
                    $model->dat_camiseta = $imagepath.rand(10,100).'_'.$model->file->name;
                }
                $model->file2 = \yii\web\UploadedFile::getInstance($model, 'file2');
                if($model->file2){
                    $imagepath2 = 'uploads/camisetados/';
                    $model->dat_camiseta2 = $imagepath2.rand(10,100).'_'.$model->file2->name;
                }
                $model->file3 = \yii\web\UploadedFile::getInstance($model, 'file3');
                if($model->file3){
                    $imagepath2 = 'uploads/patrocinador/';
                    $model->dat_imagenpatro = $imagepath2.rand(10,100).'_'.$model->file3->name;
                }
                
                if( $model->save()){
                    if($model->file){
                        $model->file->saveAs($model->dat_camiseta);
                    }
                    if($model->file2){
                        $model->file2->saveAs($model->dat_camiseta2);
                    }
                    if($model->file3){
                        $model->file3->saveAs($model->dat_imagenpatro);
                    }
                    Yii::$app->session->setFlash('success', Yii::t('app', 'Created ').$model->datClub->clu_nomcorto);
                    return $this->redirect(['create']);
                }

            }

            return $this->render('create', [
                        'model' => $model,
            ]);
    }

    /**
     * Updates an existing Datosclub model.
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
                    $imagepath = 'uploads/camiseta/';
                    $model->dat_camiseta = $imagepath.rand(10,100).'_'.$model->file->name;
                }
                $model->file2 = \yii\web\UploadedFile::getInstance($model, 'file2');
                if($model->file2){
                    $imagepath2 = 'uploads/camisetados/';
                    $model->dat_camiseta2 = $imagepath2.rand(10,100).'_'.$model->file2->name;
                }
                $model->file3 = \yii\web\UploadedFile::getInstance($model, 'file3');
                if($model->file3){
                    $imagepath2 = 'uploads/patrocinador/';
                    $model->dat_imagenpatro = $imagepath2.rand(10,100).'_'.$model->file3->name;
                }
                
                if($model->save()){
                    
                    if($model->file){
                        $model->file->saveAs($model->dat_camiseta);
                    }
                    if($model->file2){
                        $model->file2->saveAs($model->dat_camiseta2);
                    }
                    if($model->file3){
                        $model->file3->saveAs($model->dat_imagenpatro);
                    }
                    Yii::$app->session->setFlash('warning', Yii::t('app', 'Updated ').$model->datClub->clu_nomcorto);
                    return $this->redirect(['index']);
                }

            }


        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Datosclub model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $nombre = $this->findModel($id)->datClub->clu_nomcorto;
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('error', Yii::t('app', 'Deleted ') . $nombre);
        return $this->redirect(['index']);
    }
    
    public function actionDeletefoto($id){
        $foto = Datosclub::find()->where(['dat_id'=>$id])->one()->dat_camiseta;
        if($foto){
            if(!unlink($foto)){
                return false;
            }
        }
        $imagen = Datosclub::findOne($id);
        $imagen->dat_camiseta = null;
        $imagen->update();
        
        return $this->redirect(['update', 'id' => $id]);
        
    }
    
    public function actionDeletefoto2($id){
        $foto = Datosclub::find()->where(['dat_id'=>$id])->one()->dat_camiseta2;
        if($foto){
            if(!unlink($foto)){
                return false;
            }
        }
        $imagen2 = Datosclub::findOne($id);
        $imagen2->dat_camiseta2 = null;
        $imagen2->update();
        
        return $this->redirect(['update', 'id' => $id]);
        
    }
    
    public function actionDeletefoto3($id){
        $foto = Datosclub::find()->where(['dat_id'=>$id])->one()->dat_imagenpatro;
        if($foto){
            if(!unlink($foto)){
                return false;
            }
        }
        $imagen3 = Datosclub::findOne($id);
        $imagen3->dat_imagenpatro = null;
        $imagen3->update();
        
        return $this->redirect(['update', 'id' => $id]);
        
    }
    
    
    /**
     * Finds the Datosclub model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Datosclub the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Datosclub::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
