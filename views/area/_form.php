<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Area */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="area-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'are_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'are_abreviatura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'are_nivel')->textInput() ?>

    <?= $form->field($model, 'are_imagen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'are_notas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'are_create_at')->textInput() ?>

    <?= $form->field($model, 'are_update_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
