<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Division */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="division-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'div_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'div_licencia')->textInput() ?>

    <?= $form->field($model, 'div_rango')->textInput() ?>

    <?= $form->field($model, 'div_notas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'div_create_at')->textInput() ?>

    <?= $form->field($model, 'div_update_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
