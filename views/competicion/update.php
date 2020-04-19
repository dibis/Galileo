<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Competicion */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'Update').' '.
        $model->comTipocompeticion->tip_nombre.' '.$model->comDivision->div_nombre.' '.
        $model->comLicencia->lic_nombre.' / '.$model->comTemporada->temporadacompleta;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Competition'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->comTipocompeticion->tip_nombre.' '.$model->comDivision->div_nombre.' '.
        $model->comLicencia->lic_nombre.' / '.$model->comTemporada->temporadacompleta, 
    'url' => ['view', 'id' => $model->com_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="competicion-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
