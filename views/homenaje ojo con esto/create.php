<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Homenaje */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'New').' '.Yii::t('app', 'Acknowledgment');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Acknowledgment'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'New').' '.Yii::t('app', 'Acknowledgment');
?>
<div class="homenaje-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
