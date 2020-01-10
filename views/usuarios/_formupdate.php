<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */
?>
<div class="site-signup">
    <br>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <?= $form->field($model, 'username')->label('Nombre de usuario') ?>
            <?= $form->field($model, 'email') ?>

            <div class="form-group">
                <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>