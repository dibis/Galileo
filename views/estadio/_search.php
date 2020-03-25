<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searchs\EstadioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estadio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'est_id') ?>

    <?= $form->field($model, 'est_nombre') ?>

    <?= $form->field($model, 'est_nombrecorto') ?>

    <?= $form->field($model, 'est_ciudad') ?>

    <?= $form->field($model, 'est_aforo') ?>

    <?php // echo $form->field($model, 'est_imagen') ?>

    <?php // echo $form->field($model, 'est_datos') ?>

    <?php // echo $form->field($model, 'est_create_at') ?>

    <?php // echo $form->field($model, 'est_update_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
