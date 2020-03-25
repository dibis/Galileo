<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searchs\PaisSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pais-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pai_id') ?>

    <?= $form->field($model, 'pai_nombre') ?>

    <?= $form->field($model, 'pai_bandera') ?>

    <?= $form->field($model, 'pai_create_at') ?>

    <?= $form->field($model, 'pai_update_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
