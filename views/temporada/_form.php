<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Temporada */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="temporada-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tem_inicio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tem_final')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tem_activa')->textInput() ?>

    <?= $form->field($model, 'tem_create_at')->textInput() ?>

    <?= $form->field($model, 'tem_update_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
