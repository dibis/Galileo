<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Equipo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'equ_club')->textInput() ?>

    <?= $form->field($model, 'equ_nomcorto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'equ_licencia')->textInput() ?>

    <?= $form->field($model, 'equ_propio')->textInput() ?>

    <?= $form->field($model, 'equ_datos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'equ_create_at')->textInput() ?>

    <?= $form->field($model, 'equ_update_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
