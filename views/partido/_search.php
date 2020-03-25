<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searchs\PartidoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partido-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'par_id') ?>

    <?= $form->field($model, 'par_jornada') ?>

    <?= $form->field($model, 'par_equipo1') ?>

    <?= $form->field($model, 'par_equipo2') ?>

    <?= $form->field($model, 'par_resultado1') ?>

    <?php // echo $form->field($model, 'par_resultado2') ?>

    <?php // echo $form->field($model, 'par_quiniela') ?>

    <?php // echo $form->field($model, 'par_jugado') ?>

    <?php // echo $form->field($model, 'par_fecha') ?>

    <?php // echo $form->field($model, 'par_hora') ?>

    <?php // echo $form->field($model, 'par_aplazado') ?>

    <?php // echo $form->field($model, 'par_estadio') ?>

    <?php // echo $form->field($model, 'par_notas') ?>

    <?php // echo $form->field($model, 'par_cronica') ?>

    <?php // echo $form->field($model, 'par_sancion1equipo') ?>

    <?php // echo $form->field($model, 'par_sancion2equipo') ?>

    <?php // echo $form->field($model, 'par_create_at') ?>

    <?php // echo $form->field($model, 'par_update_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
