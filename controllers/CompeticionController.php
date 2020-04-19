<?php

namespace app\controllers;

use Yii;
use app\models\Competicion;
use app\models\searchs\CompeticionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CompeticionController implements the CRUD actions for Competicion model.
 */
class CompeticionController extends Controller
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
     * Lists all Competicion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CompeticionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Competicion model.
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
     * Creates a new Competicion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Competicion();

        if ($model->load(Yii::$app->request->post())) {
            $model->file = \yii\web\UploadedFile::getInstance($model, 'file');
            if ($model->file) {
                $imagepath = 'uploads/competicion/';
                $model->com_imagen = $imagepath . rand(10, 100) . '_' . $model->file->name;
            }

            if ($model->save()) {
                if ($model->file) {
                    $model->file->saveAs($model->com_imagen);
                }
                Yii::$app->session->setFlash('success', Yii::t('app', 'Created ') . 
                        $model->comTipocompeticion->tip_nombre.' '.$model->comDivision->div_nombre.' '.
                        $model->comLicencia->lic_nombre.' / '.$model->comTemporada->temporadacompleta);
                return $this->redirect(['create']);
            }
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Competicion model.
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
            if ($model->file) {
                $imagepath = 'uploads/competicion/';
                $model->com_imagen = $imagepath . rand(10, 100) . '_' . $model->file->name;
            }

            if ($model->save()) {

                if ($model->file) {
                    $model->file->saveAs($model->com_imagen);
                }
                Yii::$app->session->setFlash('warning', Yii::t('app', 'Updated ') .
                        $model->comTipocompeticion->tip_nombre.' '.$model->comDivision->div_nombre.' '.
                        $model->comLicencia->lic_nombre.' / '.$model->comTemporada->temporadacompleta);
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Competicion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $nombre = $this->findModel($id)->comTipocompeticion->tip_nombre;
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('error', Yii::t('app', 'Deleted ') . $nombre);
        return $this->redirect(['index']);
    }

    public function actionDeletefoto($id) {
        $foto = Competicion::find()->where(['com_id' => $id])->one()->com_imagen;
        if ($foto) {
            if (!unlink($foto)) {
                return false;
            }
        }
        $imagen = Competicion::findOne($id);
        $imagen->com_imagen = null;
        $imagen->update();

        return $this->redirect(['update', 'id' => $id]);
    }
    
    /**
     * Finds the Competicion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Competicion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Competicion::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
