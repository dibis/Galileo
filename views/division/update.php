<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Division */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'Update').' '. $model->div_nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Division'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->div_nombre, 'url' => ['view', 'id' => $model->div_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="division-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
