<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Club */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'Update').' '. $model->clu_nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Club'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->clu_nombre, 'url' => ['view', 'id' => $model->clu_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="club-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
