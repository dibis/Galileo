<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AuthItemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'fieldConfig' => [
            'template' => "{input}",
            'options' => [
            'tag'=>'span'
            ]
        ]
    ]); ?>

    <?= $form->field($model, 'globalSearch')->textInput([ 'placeholder' => 'Busqueda global' ])->label(false)?>

    <?php ActiveForm::end(); ?>

</div>
