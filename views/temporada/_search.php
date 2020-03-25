<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searchs\TemporadaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="temporada-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'tem_id') ?>

    <?= $form->field($model, 'tem_inicio') ?>

    <?= $form->field($model, 'tem_final') ?>

    <?= $form->field($model, 'tem_activa') ?>

    <?= $form->field($model, 'tem_create_at') ?>

    <?php // echo $form->field($model, 'tem_update_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
