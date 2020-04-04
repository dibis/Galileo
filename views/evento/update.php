<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Evento */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'Update').' '. $model->eve_nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Event'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->eve_nombre, 'url' => ['view', 'id' => $model->eve_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="evento-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
