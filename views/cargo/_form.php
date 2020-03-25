<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cargo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cargo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'car_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'car_abreviatura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'car_nivel')->textInput() ?>

    <?= $form->field($model, 'car_area')->textInput() ?>

    <?= $form->field($model, 'car_notas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'car_create_at')->textInput() ?>

    <?= $form->field($model, 'car_update_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
