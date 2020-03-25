<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Personacargo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personacargo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pec_persona')->textInput() ?>

    <?= $form->field($model, 'pec_cargo')->textInput() ?>

    <?= $form->field($model, 'pec_temporada')->textInput() ?>

    <?= $form->field($model, 'pec_imagen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pec_notas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pec_create_at')->textInput() ?>

    <?= $form->field($model, 'pec_update_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
