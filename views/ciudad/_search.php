<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searchs\CiudadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ciudad-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ciu_id') ?>

    <?= $form->field($model, 'ciu_nombre') ?>

    <?= $form->field($model, 'ciu_provincia') ?>

    <?= $form->field($model, 'ciu_codpos') ?>

    <?= $form->field($model, 'ciu_create_at') ?>

    <?php // echo $form->field($model, 'ciu_update_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
