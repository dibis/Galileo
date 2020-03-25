<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searchs\AreaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="area-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'are_id') ?>

    <?= $form->field($model, 'are_nombre') ?>

    <?= $form->field($model, 'are_abreviatura') ?>

    <?= $form->field($model, 'are_nivel') ?>

    <?= $form->field($model, 'are_imagen') ?>

    <?php // echo $form->field($model, 'are_notas') ?>

    <?php // echo $form->field($model, 'are_create_at') ?>

    <?php // echo $form->field($model, 'are_update_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
