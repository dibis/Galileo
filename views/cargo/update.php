<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cargo */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'Update').' '. $model->car_nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Position'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->car_nombre, 'url' => ['view', 'id' => $model->car_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cargo-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
