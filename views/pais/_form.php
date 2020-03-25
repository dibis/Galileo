<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pais */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pais-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pai_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pai_bandera')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pai_create_at')->textInput() ?>

    <?= $form->field($model, 'pai_update_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
