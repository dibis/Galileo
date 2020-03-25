<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searchs\PersonacargoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personacargo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pec_id') ?>

    <?= $form->field($model, 'pec_persona') ?>

    <?= $form->field($model, 'pec_cargo') ?>

    <?= $form->field($model, 'pec_temporada') ?>

    <?= $form->field($model, 'pec_imagen') ?>

    <?php // echo $form->field($model, 'pec_notas') ?>

    <?php // echo $form->field($model, 'pec_create_at') ?>

    <?php // echo $form->field($model, 'pec_update_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
