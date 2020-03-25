<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searchs\EstadioclubSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estadioclub-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'escl_id') ?>

    <?= $form->field($model, 'escl_estadio') ?>

    <?= $form->field($model, 'escl_club') ?>

    <?= $form->field($model, 'escl_actual') ?>

    <?= $form->field($model, 'escl_temporadainicio') ?>

    <?php // echo $form->field($model, 'escl_temporadafin') ?>

    <?php // echo $form->field($model, 'escl_notas') ?>

    <?php // echo $form->field($model, 'escl_create_at') ?>

    <?php // echo $form->field($model, 'escl_update_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
