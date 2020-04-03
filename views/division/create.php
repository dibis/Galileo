<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Division */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'New').' '.Yii::t('app', 'Division');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Division'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'New').' '.Yii::t('app', 'Division');
?>
<div class="division-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
