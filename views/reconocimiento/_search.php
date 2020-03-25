<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searchs\ReconocimientoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reconocimiento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'rec_id') ?>

    <?= $form->field($model, 'rec_nombre') ?>

    <?= $form->field($model, 'rec_abreviatura') ?>

    <?= $form->field($model, 'rec_imagen') ?>

    <?= $form->field($model, 'rec_notas') ?>

    <?php // echo $form->field($model, 'rec_create_at') ?>

    <?php // echo $form->field($model, 'rec_update_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
