<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Clasificacionalt */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clasificacionalt-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cla_competicion')->textInput() ?>

    <?= $form->field($model, 'cla_equipocomp')->textInput() ?>

    <?= $form->field($model, 'cla_posicion')->textInput() ?>

    <?= $form->field($model, 'cla_jugados')->textInput() ?>

    <?= $form->field($model, 'cla_victorias')->textInput() ?>

    <?= $form->field($model, 'cla_empates')->textInput() ?>

    <?= $form->field($model, 'cla_derrotas')->textInput() ?>

    <?= $form->field($model, 'cla_golesfavor')->textInput() ?>

    <?= $form->field($model, 'cla_golescontra')->textInput() ?>

    <?= $form->field($model, 'cla_puntos')->textInput() ?>

    <?= $form->field($model, 'cla_puntossancion')->textInput() ?>

    <?= $form->field($model, 'cla_notas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cla_create_at')->textInput() ?>

    <?= $form->field($model, 'cla_update_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
