<?php

namespace app\controllers;

use Yii;
use app\models\Club;
use app\models\searchs\ClubSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ClubController implements the CRUD actions for Club model.
 */
class ClubController extends Controller
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
     * Lists all Club models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClubSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Club model.
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
     * Creates a new Club model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Club();

            if ($model->load(Yii::$app->request->post())) {
                $model->file = \yii\web\UploadedFile::getInstance($model, 'file');
                if($model->file){
                    $imagepath = 'uploads/escudo/';
                    $model->clu_escudo = $imagepath.rand(10,100).'_'.$model->file->name;
                }
                $model->file2 = \yii\web\UploadedFile::getInstance($model, 'file2');
                if($model->file2){
                    $imagepath2 = 'uploads/equipacion/';
                    $model->clu_imageequipac = $imagepath2.rand(10,100).'_'.$model->file2->name;
                }
                
                if( $model->save()){
                    if($model->file){
                        $model->file->saveAs($model->clu_escudo);
                    }
                    if($model->file2){
                        $model->file2->saveAs($model->clu_imageequipac);
                    }
                    Yii::$app->session->setFlash('success', Yii::t('app', 'Created ').$model->clu_nombre);
                    return $this->redirect(['create']);
                }

            }

            return $this->render('create', [
                        'model' => $model,
            ]);
    }

    /**
     * Updates an existing Club model.
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
                    $imagepath = 'uploads/escudo/';
                    $model->clu_escudo = $imagepath.rand(10,100).'_'.$model->file->name;
                }
                $model->file2 = \yii\web\UploadedFile::getInstance($model, 'file2');
                if($model->file2){
                    $imagepath2 = 'uploads/equipacion/';
                    $model->clu_imageequipac = $imagepath2.rand(10,100).'_'.$model->file2->name;
                }
                
                
                if($model->save()){
                    
                    if($model->file){
                        $model->file->saveAs($model->clu_escudo);
                    }
                    if($model->file2){
                        $model->file2->saveAs($model->clu_imageequipac);
                    }
                    Yii::$app->session->setFlash('warning', Yii::t('app', 'Updated ').$model->clu_nombre);
                    return $this->redirect(['index']);
                }

            }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Club model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $nombre = $this->findModel($id)->clu_nombre;
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('error', Yii::t('app', 'Deleted ') . $nombre);
        return $this->redirect(['index']);
    }

    public function actionDeletefoto($id){
        $foto = Club::find()->where(['clu_id'=>$id])->one()->clu_escudo;
        if($foto){
            if(!unlink($foto)){
                return false;
            }
        }
        $imagen = Club::findOne($id);
        $imagen->clu_escudo = null;
        $imagen->update();
        
        return $this->redirect(['update', 'id' => $id]);
        
    }
    
    public function actionDeletefoto2($id){
        $foto = Club::find()->where(['clu_id'=>$id])->one()->clu_imageequipac;
        if($foto){
            if(!unlink($foto)){
                return false;
            }
        }
        $imagen2 = Club::findOne($id);
        $imagen2->clu_imageequipac = null;
        $imagen2->update();
        
        return $this->redirect(['update', 'id' => $id]);
        
    }
    
    /**
     * Finds the Club model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Club the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Club::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
