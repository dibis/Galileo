<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\checkbox\CheckboxX;
use app\models\Club;
use app\models\Licencia;

/* @var $this yii\web\View */
/* @var $model app\models\Equipo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'equ_nomcorto')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'equ_club')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Club::find()->orderBy('clu_nombre')->all(), 'clu_id', 'clu_nombre'),
        'language' => 'es',
        'size' => Select2::SIZE_LARGE,
        'options' => ['placeholder' => Yii::t('app', 'Select one club')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?=
    $form->field($model, 'equ_licencia')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Licencia::find()->orderBy('lic_nombre')->all(), 'li_id', 'lic_nombre'),
        'language' => 'es',
        'size' => Select2::SIZE_LARGE,
        'options' => ['placeholder' => Yii::t('app', 'Select one license')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?=
    $form->field($model, 'equ_propio')->widget(CheckboxX::classname(), [
        'initInputType' => CheckboxX::INPUT_CHECKBOX,
        'autoLabel' => true
    ])->label(false);
    ?>

    <?= $form->field($model, 'equ_datos')->textarea(['maxlength' => true, 'rows' => 2]) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    
</div>
