<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searchs\EquipoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'equ_id') ?>

    <?= $form->field($model, 'equ_club') ?>

    <?= $form->field($model, 'equ_nomcorto') ?>

    <?= $form->field($model, 'equ_licencia') ?>

    <?= $form->field($model, 'equ_propio') ?>

    <?php // echo $form->field($model, 'equ_datos') ?>

    <?php // echo $form->field($model, 'equ_create_at') ?>

    <?php // echo $form->field($model, 'equ_update_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
