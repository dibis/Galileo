<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Licencia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="licencia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lic_nombre')->textInput(['maxlength' => true]) ?>
    
    <div  class="row">
        <div class="col-xs-6">
            <?= $form->field($model, 'lic_letra')->textInput(['maxlength' => true, 'style' => 'text-transform: uppercase']) ?>
        </div>
        <div class="col-xs-6">
            <?= $form->field($model, 'lic_rango')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <?= $form->field($model, 'lic_notas')->textarea(['maxlength' => true, 'rows' => 3]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
