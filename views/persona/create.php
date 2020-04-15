<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'New').' '.Yii::t('app', 'Person');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Person'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'New').' '.Yii::t('app', 'Person');
?>
<div class="persona-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
