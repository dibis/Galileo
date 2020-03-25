<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searchs\CargoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cargo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'car_id') ?>

    <?= $form->field($model, 'car_nombre') ?>

    <?= $form->field($model, 'car_abreviatura') ?>

    <?= $form->field($model, 'car_nivel') ?>

    <?= $form->field($model, 'car_area') ?>

    <?php // echo $form->field($model, 'car_notas') ?>

    <?php // echo $form->field($model, 'car_create_at') ?>

    <?php // echo $form->field($model, 'car_update_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
