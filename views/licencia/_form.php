<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Licencia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="licencia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lic_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lic_letra')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lic_rango')->textInput() ?>

    <?= $form->field($model, 'lic_notas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lic_create_at')->textInput() ?>

    <?= $form->field($model, 'lic_update_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
