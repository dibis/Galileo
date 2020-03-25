<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searchs\DatosclubSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="datosclub-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'dat_id') ?>

    <?= $form->field($model, 'dat_club') ?>

    <?= $form->field($model, 'dat_temporada') ?>

    <?= $form->field($model, 'dat_socios') ?>

    <?= $form->field($model, 'dat_presupuesto') ?>

    <?php // echo $form->field($model, 'dat_camiseta') ?>

    <?php // echo $form->field($model, 'dat_camiseta2') ?>

    <?php // echo $form->field($model, 'dat_patrocinador') ?>

    <?php // echo $form->field($model, 'dat_imagenpatro') ?>

    <?php // echo $form->field($model, 'dat_notas') ?>

    <?php // echo $form->field($model, 'dat_create_at') ?>

    <?php // echo $form->field($model, 'dat_update_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
