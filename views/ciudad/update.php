<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ciudad */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'Update').' '. $model->ciu_nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'City'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ciu_nombre, 'url' => ['view', 'id' => $model->ciu_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ciudad-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
