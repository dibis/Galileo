<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searchs\PartidoeventoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partidoevento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pae_id') ?>

    <?= $form->field($model, 'pae_partido') ?>

    <?= $form->field($model, 'pae_personacargo') ?>

    <?= $form->field($model, 'pae_evento') ?>

    <?= $form->field($model, 'pae_minuto') ?>

    <?php // echo $form->field($model, 'pae_cantidad') ?>

    <?php // echo $form->field($model, 'pae_especial') ?>

    <?php // echo $form->field($model, 'pae_create_at') ?>

    <?php // echo $form->field($model, 'pae_update_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
