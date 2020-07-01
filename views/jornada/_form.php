<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use app\models\Competicion;

/* @var $this yii\web\View */
/* @var $model app\models\Jornada */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jornada-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jor_nombrenum')->textInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'Name or number')]) ?>

    <?=
    $form->field($model, 'jor_fecha')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => '00-00-0000'],
        'pluginOptions' => [
            'language' => 'es',
            'autoclose' => true,
            //'endDate' => "0d",
            'todayHighlight' => true,
            'format' => 'dd-mm-yyyy',
        ]
    ]);
    ?>  

    <?=
    $form->field($model, 'jor_competicion')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Competicion::find()->orderBy('com_division')->all(), 'com_id', 'competicioncompleta'),
        'language' => 'es',
        'size' => Select2::SIZE_LARGE,
        'options' => ['placeholder' => Yii::t('app', 'Select one competition')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
