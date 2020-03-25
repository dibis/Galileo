<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Equipocompeticion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipocompeticion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'eqc_id')->textInput() ?>

    <?= $form->field($model, 'eqc_equipo')->textInput() ?>

    <?= $form->field($model, 'eqc_competicion')->textInput() ?>

    <?= $form->field($model, 'eqc_denominacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'eqc_notas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'eqc_create_at')->textInput() ?>

    <?= $form->field($model, 'eqc_update_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
