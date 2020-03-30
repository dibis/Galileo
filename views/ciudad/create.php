<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ciudad */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'New').' '.Yii::t('app', 'City');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'City'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'New').' '.Yii::t('app', 'City');
?>
<div class="ciudad-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
