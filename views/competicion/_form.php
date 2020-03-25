<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Competicion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="competicion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'com_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'com_tipocompeticion')->textInput() ?>

    <?= $form->field($model, 'com_temporada')->textInput() ?>

    <?= $form->field($model, 'com_licencia')->textInput() ?>

    <?= $form->field($model, 'com_grupo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'com_division')->textInput() ?>

    <?= $form->field($model, 'com_numeroequipos')->textInput() ?>

    <?= $form->field($model, 'com_imagen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'com_notas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'com_create_at')->textInput() ?>

    <?= $form->field($model, 'com_update_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
