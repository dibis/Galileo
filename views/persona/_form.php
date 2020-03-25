<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'per_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_apellidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_genero')->textInput() ?>

    <?= $form->field($model, 'per_apodo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_fechanacim')->textInput() ?>

    <?= $form->field($model, 'per_localidad')->textInput() ?>

    <?= $form->field($model, 'per_fallecido')->textInput() ?>

    <?= $form->field($model, 'per_imagengeneral')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_notas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'per_create_at')->textInput() ?>

    <?= $form->field($model, 'per_update_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
