<?php

namespace app\controllers;

use Yii;
use app\models\Licencia;
use app\models\searchs\LicenciaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LicenciaController implements the CRUD actions for Licencia model.
 */
class LicenciaController extends Controller
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
     * Lists all Licencia models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LicenciaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Licencia model.
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
     * Creates a new Licencia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Licencia();
        
            if ($model->load(Yii::$app->request->post())) {

                $mayusculas = $model->lic_letra;
                $model->lic_letra = strtoupper($mayusculas);
                
                if( $model->save()){

                    Yii::$app->session->setFlash('success', Yii::t('app', 'Created ').$model->lic_nombre);
                    return $this->redirect(['create']);
                }

            }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Licencia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $mayusculas = $model->lic_letra;
            $model->lic_letra = strtoupper($mayusculas);

            if ($model->save()) {

                Yii::$app->session->setFlash('warning', Yii::t('app', 'Updated ') . $model->lic_nombre);
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Licencia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $nombre = $this->findModel($id)->lic_nombre;
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('error', Yii::t('app', 'Deleted ') . $nombre);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Licencia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Licencia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Licencia::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
