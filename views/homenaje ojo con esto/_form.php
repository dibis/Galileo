<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Homenaje */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="homenaje-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hom_persona')->textInput() ?>

    <?= $form->field($model, 'hom_reconocimiento')->textInput() ?>

    <?= $form->field($model, 'hom_temporada')->textInput() ?>

    <?= $form->field($model, 'hom_fecha')->textInput() ?>

    <?= $form->field($model, 'hom_notas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hom_create_at')->textInput() ?>

    <?= $form->field($model, 'hom_update_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
