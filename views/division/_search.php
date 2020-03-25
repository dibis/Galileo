<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searchs\DivisionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="division-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'div_id') ?>

    <?= $form->field($model, 'div_nombre') ?>

    <?= $form->field($model, 'div_licencia') ?>

    <?= $form->field($model, 'div_rango') ?>

    <?= $form->field($model, 'div_notas') ?>

    <?php // echo $form->field($model, 'div_create_at') ?>

    <?php // echo $form->field($model, 'div_update_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
