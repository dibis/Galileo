<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
use app\models\Provincia;

/* @var $this yii\web\View */
/* @var $model app\models\Ciudad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ciudad-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ciu_nombre')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'ciu_provincia')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Provincia::find()->orderBy('pro_nombre')->all(), 'pro_id', 'pro_nombre'),
        'language' => 'es',
        'options' => ['placeholder' => Yii::t('app', 'Select one province')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'ciu_codpos')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
