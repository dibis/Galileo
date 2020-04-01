<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tipocompeticion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipocompeticion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tip_nombre')->textInput() ?>

    <?= $form->field($model, 'tip_rango')->textInput() ?>

    <?= $form->field($model, 'tip_notas')->textarea(['maxlength' => true, 'rows' => 5]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
