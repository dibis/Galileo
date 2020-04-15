<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
use kartik\checkbox\CheckboxX;
use kartik\date\DatePicker;
use app\models\Ciudad;
//use zhuravljov\yii\widgets\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Persona */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div  class="row">
        <div class="col-xs-4">
            <?= $form->field($model, 'per_nombre')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'per_apellidos')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'per_apodo')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div  class="row">
        <div class="col-xs-4">
            <?=
            $form->field($model, 'per_localidad')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Ciudad::find()->orderBy('ciu_nombre')->all(), 'ciu_id', 'ciu_nombre'),
                'language' => 'es',
                 'size' => Select2::SIZE_LARGE,
                'options' => ['placeholder' => Yii::t('app', 'Select one city')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-xs-4">
            <?=
            $form->field($model, 'per_fechanacim')->widget(DatePicker::classname(), [
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
        </div>
        <div class="col-xs-2" style="padding-top: 35px;">
            <?=
            $form->field($model, 'per_genero')->widget(CheckboxX::classname(), [
                'initInputType' => CheckboxX::INPUT_CHECKBOX,
                'autoLabel' => true
            ])->label(false);
            ?>
        </div>
        <div class="col-xs-2" style="padding-top: 35px;">
            <?=
            $form->field($model, 'per_fallecido')->widget(CheckboxX::classname(), [
                'initInputType' => CheckboxX::INPUT_CHECKBOX,
                'autoLabel' => true
            ])->label(false);
            ?>
        </div>
    </div>

    <div class="panel panel-success ">
        <div class="panel-heading" style="font-weight:bold;"><?= Yii::t('app', 'Image') ?></div>
        <div class="panel-body">
            <div class="col-md-1" style="text-align: left"><br>

                <?php
                if ($model->per_imagengeneral) {
                    echo '<center>';
                    echo '<img src="' . \Yii::$app->request->baseUrl . '/' . $model->per_imagengeneral . '" width="40px">';
                    echo '<br><br>';
                    echo Html::a(Yii::t('app', 'Delete'), ['persona/deletefoto', 'id' => $model->per_id],
                            ['class' => 'btn btn-xs btn-danger']) . '<p>';
                    echo '</center>';
                }
                ?>

            </div>
            <div class="col-md-1"><br></div>
            <div class="col-md-4" style="text-align: left"><br>

                <?= $form->field($model, 'file')->fileInput(['class' => 'btn btn-success'])->label(false) ?>

            </div>

            <div class="col-md-1"><br></div>
        </div>
    </div>

    <?= $form->field($model, 'per_notas')->textarea(['maxlength' => true, 'rows' => 2]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
