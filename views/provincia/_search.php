<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searchs\ProvinciaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="provincia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pro_id') ?>

    <?= $form->field($model, 'pro_nombre') ?>

    <?= $form->field($model, 'pro_region') ?>

    <?= $form->field($model, 'pro_create_at') ?>

    <?= $form->field($model, 'pro_update_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
