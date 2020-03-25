<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searchs\EventoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="evento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'eve_id') ?>

    <?= $form->field($model, 'eve_nombre') ?>

    <?= $form->field($model, 'eve_abreviatura') ?>

    <?= $form->field($model, 'eve_imagen') ?>

    <?= $form->field($model, 'eve_descripcion') ?>

    <?php // echo $form->field($model, 'eve_create_at') ?>

    <?php // echo $form->field($model, 'eve_update_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
