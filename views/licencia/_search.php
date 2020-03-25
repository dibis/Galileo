<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searchs\LicenciaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="licencia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'li_id') ?>

    <?= $form->field($model, 'lic_nombre') ?>

    <?= $form->field($model, 'lic_letra') ?>

    <?= $form->field($model, 'lic_rango') ?>

    <?= $form->field($model, 'lic_notas') ?>

    <?php // echo $form->field($model, 'lic_create_at') ?>

    <?php // echo $form->field($model, 'lic_update_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
