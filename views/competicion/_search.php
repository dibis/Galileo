<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searchs\CompeticionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="competicion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'com_id') ?>

    <?= $form->field($model, 'com_nombre') ?>

    <?= $form->field($model, 'com_tipocompeticion') ?>

    <?= $form->field($model, 'com_temporada') ?>

    <?= $form->field($model, 'com_licencia') ?>

    <?php // echo $form->field($model, 'com_grupo') ?>

    <?php // echo $form->field($model, 'com_division') ?>

    <?php // echo $form->field($model, 'com_numeroequipos') ?>

    <?php // echo $form->field($model, 'com_imagen') ?>

    <?php // echo $form->field($model, 'com_notas') ?>

    <?php // echo $form->field($model, 'com_create_at') ?>

    <?php // echo $form->field($model, 'com_update_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
