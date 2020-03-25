<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Reconocimiento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reconocimiento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rec_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rec_abreviatura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rec_imagen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rec_notas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rec_create_at')->textInput() ?>

    <?= $form->field($model, 'rec_update_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
