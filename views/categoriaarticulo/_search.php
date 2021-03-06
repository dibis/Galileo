<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searchs\CategoriaarticuloSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categoriaarticulo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'car_id') ?>

    <?= $form->field($model, 'car_nombre') ?>

    <?= $form->field($model, 'car_descripcion') ?>

    <?= $form->field($model, 'car_activa') ?>

    <?= $form->field($model, 'car_create_at') ?>

    <?php // echo $form->field($model, 'car_update_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
