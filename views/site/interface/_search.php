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
        'fieldConfig' => [
            'template' => "{input}",
            'options' => [
            'tag'=>'span'
            ]
        ]
    ]); ?>

    <?= $form->field($model, 'globalSearch')->textInput([ 'placeholder' => Yii::t('app', 'Search')])->label(false)?>

    <?php ActiveForm::end(); ?>

</div>
