<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use app\models\Temporada;
use app\models\Reconocimiento;
use app\models\Persona;

/* @var $this yii\web\View */
/* @var $model app\models\Homenaje */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="homenaje-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'hom_persona')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Persona::find()->orderBy('per_nombre')->all(), 'per_id', 'personacompleta'),
        'language' => 'es',
        'size' => Select2::SIZE_LARGE,
        'options' => ['placeholder' => Yii::t('app', 'Select one person')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?=
    $form->field($model, 'hom_reconocimiento')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Reconocimiento::find()->orderBy('rec_nombre')->all(), 'rec_id', 'rec_nombre'),
        'language' => 'es',
        'size' => Select2::SIZE_LARGE,
        'options' => ['placeholder' => Yii::t('app', 'Select one acknowledgment')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?=
    $form->field($model, 'hom_temporada')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Temporada::find()->orderBy('tem_inicio')->all(), 'tem_id', 'temporadacompleta'),
        'language' => 'es',
        'size' => Select2::SIZE_LARGE,
        'options' => ['placeholder' => Yii::t('app', 'Select one season')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>


    <?=
    $form->field($model, 'hom_fecha')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => '00-00-0000'],
        'pluginOptions' => [
            'language' => 'es',
            'autoclose' => true,
            'endDate' => "0d",
            'todayHighlight' => true,
            'format' => 'dd-mm-yyyy',
        ]
    ]);
    ?>  



    <?= $form->field($model, 'hom_notas')->textarea(['maxlength' => true, 'rows' => 4]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

