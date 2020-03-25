<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searchs\TipocompeticionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipocompeticion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'tip_id') ?>

    <?= $form->field($model, 'tip_nombre') ?>

    <?= $form->field($model, 'tip_rango') ?>

    <?= $form->field($model, 'tip_notas') ?>

    <?= $form->field($model, 'tip_create_at') ?>

    <?php // echo $form->field($model, 'tip_update_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
