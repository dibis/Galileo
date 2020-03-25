<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Jornada */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jornada-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jor_nombrenum')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jor_fecha')->textInput() ?>

    <?= $form->field($model, 'jor_competicion')->textInput() ?>

    <?= $form->field($model, 'jor_create_at')->textInput() ?>

    <?= $form->field($model, 'jor_update_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
