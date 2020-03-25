<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Region */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="region-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'reg_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reg_pais')->textInput() ?>

    <?= $form->field($model, 'reg_bandera')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reg_create_at')->textInput() ?>

    <?= $form->field($model, 'reg_update_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
