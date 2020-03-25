<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Evento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="evento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'eve_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'eve_abreviatura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'eve_imagen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'eve_descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'eve_create_at')->textInput() ?>

    <?= $form->field($model, 'eve_update_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
