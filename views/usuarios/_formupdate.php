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
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <div class="col-md-6">
            <?= $form->field($model, 'username')->label('Nombre de usuario') ?>
            <?= $form->field($model, 'name') ?>
            </div>
            <div class="col-md-6">
            <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'surnames') ?>
            </div>
            
            <?php
            if ($model->image) {

                echo '<img src="' . \Yii::$app->request->baseUrl . '/' . $model->image . '" width="70px">';
                echo '<br>';
                echo Html::a(Yii::t('app', 'Eliminar'), ['usuarios/deletefoto', 'id' => $model->id], ['class' => 'btn-danger']) . '<p>';

            }
            ?>

            <?= $form->field($model, 'file')->fileInput() ?>

            <br><br><div class="form-group">
                <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
            </div>

        </div>
            
            <?php ActiveForm::end(); ?>
        </div>


    </div>
</div>