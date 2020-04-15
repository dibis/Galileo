<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Club */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'New').' '.Yii::t('app', 'Club');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Club'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'New').' '.Yii::t('app', 'Club');
?>
<div class="club-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
