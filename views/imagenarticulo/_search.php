<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searchs\ImagenarticuloSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="imagenarticulo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'imar_id') ?>

    <?= $form->field($model, 'imar_articulo') ?>

    <?= $form->field($model, 'imar_imagen') ?>

    <?= $form->field($model, 'imar_create_at') ?>

    <?= $form->field($model, 'imar_update_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
