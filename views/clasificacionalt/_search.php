<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searchs\ClasificacionaltSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clasificacionalt-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cla_id') ?>

    <?= $form->field($model, 'cla_competicion') ?>

    <?= $form->field($model, 'cla_equipocomp') ?>

    <?= $form->field($model, 'cla_posicion') ?>

    <?= $form->field($model, 'cla_jugados') ?>

    <?php // echo $form->field($model, 'cla_victorias') ?>

    <?php // echo $form->field($model, 'cla_empates') ?>

    <?php // echo $form->field($model, 'cla_derrotas') ?>

    <?php // echo $form->field($model, 'cla_golesfavor') ?>

    <?php // echo $form->field($model, 'cla_golescontra') ?>

    <?php // echo $form->field($model, 'cla_puntos') ?>

    <?php // echo $form->field($model, 'cla_puntossancion') ?>

    <?php // echo $form->field($model, 'cla_notas') ?>

    <?php // echo $form->field($model, 'cla_create_at') ?>

    <?php // echo $form->field($model, 'cla_update_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
