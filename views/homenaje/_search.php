<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searchs\HomenajeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="homenaje-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'hom_id') ?>

    <?= $form->field($model, 'hom_persona') ?>

    <?= $form->field($model, 'hom_reconocimiento') ?>

    <?= $form->field($model, 'hom_temporada') ?>

    <?= $form->field($model, 'hom_fecha') ?>

    <?php // echo $form->field($model, 'hom_notas') ?>

    <?php // echo $form->field($model, 'hom_create_at') ?>

    <?php // echo $form->field($model, 'hom_update_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
