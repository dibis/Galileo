<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Imagenarticulo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="imagenarticulo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'imar_articulo')->textInput() ?>

    <?= $form->field($model, 'imar_imagen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imar_create_at')->textInput() ?>

    <?= $form->field($model, 'imar_update_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
