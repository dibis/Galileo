<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ciudad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ciudad-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ciu_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ciu_provincia')->textInput() ?>

    <?= $form->field($model, 'ciu_codpos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ciu_create_at')->textInput() ?>

    <?= $form->field($model, 'ciu_update_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
