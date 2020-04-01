<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tipocompeticion */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'Update').' '. $model->tip_nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Type of competition'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tip_nombre, 'url' => ['view', 'id' => $model->tip_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tipocompeticion-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
