<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
use app\models\Area;

/* @var $this yii\web\View */
/* @var $model app\models\Cargo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cargo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'car_nombre')->textInput(['maxlength' => true]) ?>

    <div  class="row">
        <div class="col-xs-4">
            <?= $form->field($model, 'car_abreviatura')->textInput(['maxlength' => true, 'style' => 'text-transform: uppercase']) ?>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'car_nivel')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-4">
            <?=
            $form->field($model, 'car_area')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Area::find()->orderBy('are_nombre')->all(), 'are_id', 'are_nombre'),
                'language' => 'es',
                'options' => ['placeholder' => Yii::t('app', 'Select one area')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
    </div>

    <?= $form->field($model, 'car_notas')->textarea(['maxlength' => true, 'rows' => 2]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
