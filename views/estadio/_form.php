<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Estadio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estadio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'est_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_nombrecorto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_ciudad')->textInput() ?>

    <?= $form->field($model, 'est_aforo')->textInput() ?>

    <?= $form->field($model, 'est_imagen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_datos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'est_create_at')->textInput() ?>

    <?= $form->field($model, 'est_update_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
