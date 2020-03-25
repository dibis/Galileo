<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Datosclub */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="datosclub-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dat_club')->textInput() ?>

    <?= $form->field($model, 'dat_temporada')->textInput() ?>

    <?= $form->field($model, 'dat_socios')->textInput() ?>

    <?= $form->field($model, 'dat_presupuesto')->textInput() ?>

    <?= $form->field($model, 'dat_camiseta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dat_camiseta2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dat_patrocinador')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dat_imagenpatro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dat_notas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dat_create_at')->textInput() ?>

    <?= $form->field($model, 'dat_update_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
