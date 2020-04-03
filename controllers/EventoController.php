<?php

namespace app\controllers;

use Yii;
use app\models\Evento;
use app\models\searchs\EventoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EventoController implements the CRUD actions for Evento model.
 */
class EventoController extends Controller {

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
     * Lists all Evento models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new EventoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Evento model.
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
     * Creates a new Evento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Evento();

        if ($model->load(Yii::$app->request->post())) {
            $model->file = \yii\web\UploadedFile::getInstance($model, 'file');
            if ($model->file) {
                $imagepath = 'uploads/evento/';
                $model->eve_imagen = $imagepath . rand(10, 100) . '_' . $model->file->name;
            }

            $mayusculas = $model->eve_abreviatura;
            $model->eve_abreviatura = strtoupper($mayusculas);

            if ($model->save()) {
                if ($model->file) {
                    $model->file->saveAs($model->eve_imagen);
                }
                Yii::$app->session->setFlash('success', Yii::t('app', 'Created ') . $model->eve_nombre);
                return $this->redirect(['create']);
            }
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Evento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $model->file = \yii\web\UploadedFile::getInstance($model, 'file');
            if ($model->file) {
                $imagepath = 'uploads/evento/';
                $model->eve_imagen = $imagepath . rand(10, 100) . '_' . $model->file->name;
            }

            $mayusculas = $model->eve_abreviatura;
            $model->eve_abreviatura = strtoupper($mayusculas);

            if ($model->save()) {

                if ($model->file) {
                    $model->file->saveAs($model->eve_imagen);
                }
                Yii::$app->session->setFlash('warning', Yii::t('app', 'Updated ') . $model->eve_nombre);
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Evento model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $nombre = $this->findModel($id)->eve_nombre;
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('error', Yii::t('app', 'Deleted ') . $nombre);
        return $this->redirect(['index']);
    }

    public function actionDeletefoto($id) {
        $foto = Evento::find()->where(['eve_id' => $id])->one()->eve_imagen;
        if ($foto) {
            if (!unlink($foto)) {
                return false;
            }
        }
        $imagen = Evento::findOne($id);
        $imagen->eve_imagen = null;
        $imagen->update();

        return $this->redirect(['update', 'id' => $id]);
    }

    /**
     * Finds the Evento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Evento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Evento::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
