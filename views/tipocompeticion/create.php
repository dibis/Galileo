<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tipocompeticion */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'New').' '.Yii::t('app', 'Type of competition');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Type of competition'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'New').' '.Yii::t('app', 'Type of competition');
?>
<div class="tipocompeticion-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
