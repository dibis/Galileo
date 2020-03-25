<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Estadioclub */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estadioclub-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'escl_estadio')->textInput() ?>

    <?= $form->field($model, 'escl_club')->textInput() ?>

    <?= $form->field($model, 'escl_actual')->textInput() ?>

    <?= $form->field($model, 'escl_temporadainicio')->textInput() ?>

    <?= $form->field($model, 'escl_temporadafin')->textInput() ?>

    <?= $form->field($model, 'escl_notas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'escl_create_at')->textInput() ?>

    <?= $form->field($model, 'escl_update_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
