<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searchs\EquipocompeticionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipocompeticion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'eqc_id') ?>

    <?= $form->field($model, 'eqc_equipo') ?>

    <?= $form->field($model, 'eqc_competicion') ?>

    <?= $form->field($model, 'eqc_denominacion') ?>

    <?= $form->field($model, 'eqc_notas') ?>

    <?php // echo $form->field($model, 'eqc_create_at') ?>

    <?php // echo $form->field($model, 'eqc_update_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
