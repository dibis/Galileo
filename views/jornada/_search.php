<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searchs\JornadaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jornada-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'jor_id') ?>

    <?= $form->field($model, 'jor_nombrenum') ?>

    <?= $form->field($model, 'jor_fecha') ?>

    <?= $form->field($model, 'jor_competicion') ?>

    <?= $form->field($model, 'jor_create_at') ?>

    <?php // echo $form->field($model, 'jor_update_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
