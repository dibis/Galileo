<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Provincia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="provincia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pro_nombre')->textInput() ?>

    <?= $form->field($model, 'pro_region')->textInput() ?>

    <?= $form->field($model, 'pro_create_at')->textInput() ?>

    <?= $form->field($model, 'pro_update_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
