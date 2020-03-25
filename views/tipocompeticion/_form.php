<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tipocompeticion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipocompeticion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tip_nombre')->textInput() ?>

    <?= $form->field($model, 'tip_rango')->textInput() ?>

    <?= $form->field($model, 'tip_notas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tip_create_at')->textInput() ?>

    <?= $form->field($model, 'tip_update_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
