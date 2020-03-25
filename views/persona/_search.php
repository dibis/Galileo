<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searchs\PersonaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'per_id') ?>

    <?= $form->field($model, 'per_nombre') ?>

    <?= $form->field($model, 'per_apellidos') ?>

    <?= $form->field($model, 'per_genero') ?>

    <?= $form->field($model, 'per_apodo') ?>

    <?php // echo $form->field($model, 'per_fechanacim') ?>

    <?php // echo $form->field($model, 'per_localidad') ?>

    <?php // echo $form->field($model, 'per_fallecido') ?>

    <?php // echo $form->field($model, 'per_imagengeneral') ?>

    <?php // echo $form->field($model, 'per_notas') ?>

    <?php // echo $form->field($model, 'per_create_at') ?>

    <?php // echo $form->field($model, 'per_update_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
