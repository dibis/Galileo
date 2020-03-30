<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Area */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'Update').' '. $model->are_nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Area'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->are_nombre, 'url' => ['view', 'id' => $model->are_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="area-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
