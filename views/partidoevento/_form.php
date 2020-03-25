<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Partidoevento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partidoevento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pae_partido')->textInput() ?>

    <?= $form->field($model, 'pae_personacargo')->textInput() ?>

    <?= $form->field($model, 'pae_evento')->textInput() ?>

    <?= $form->field($model, 'pae_minuto')->textInput() ?>

    <?= $form->field($model, 'pae_cantidad')->textInput() ?>

    <?= $form->field($model, 'pae_especial')->textInput() ?>

    <?= $form->field($model, 'pae_create_at')->textInput() ?>

    <?= $form->field($model, 'pae_update_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
