<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Tipocompeticion;
use app\models\Temporada;
use app\models\Licencia;
use app\models\Division;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Competicion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="competicion-form">

    <?php $form = ActiveForm::begin(); ?>

    <div  class="row">
    <div class="col-xs-12"><div class="panel panel-success "><div class="panel-body">
        <div class="col-xs-6">
            <?=
            $form->field($model, 'com_tipocompeticion')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Tipocompeticion::find()->orderBy('tip_nombre')->all(), 'tip_id', 'tip_nombre'),
                'language' => 'es',
                'options' => ['placeholder' => Yii::t('app', 'Select type of competition')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>

        </div>
        <div class="col-xs-6">
            <?=
            $form->field($model, 'com_temporada')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Temporada::find()->orderBy('tem_inicio')->all(), 'tem_id', 'temporadacompleta'),
                'language' => 'es',
                'options' => ['placeholder' => Yii::t('app', 'Select one season')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div></div></div></div>
    </div><br>

    <div  class="row">
        <div class="col-xs-12"><div class="panel panel-success "><div class="panel-body">
        <div class="col-xs-3">
            <?=
            $form->field($model, 'com_division')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Division::find()->orderBy('div_nombre')->all(), 'div_id', 'div_nombre'),
                'language' => 'es',
                'options' => ['placeholder' => Yii::t('app', 'Select one division')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-xs-3">
            <?= $form->field($model, 'com_grupo')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-3">
            <?=
            $form->field($model, 'com_licencia')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Licencia::find()->orderBy('lic_nombre')->all(), 'li_id', 'lic_nombre'),
                'language' => 'es',
                'options' => ['placeholder' => Yii::t('app', 'Select one license')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-xs-3">
            <?= $form->field($model, 'com_numeroequipos')->textInput(['type' => 'text', 'maxlength' => 2]) ?>
        </div>
    </div></div></div></div><br>

    <div  class="row">
        <div class="col-xs-6">
    <div class="panel panel-success ">
        <div class="panel-heading" style="font-weight:bold;"><?= Yii::t('app', 'Image') ?></div>
        <div class="panel-body">
            <div class="col-md-1" style="text-align: left"><br>

                <?php
                if ($model->com_imagen) {
                    echo '<center>';
                    echo '<img src="' . \Yii::$app->request->baseUrl . '/' . $model->com_imagen . '" width="40px">';
                    echo '<br><br>';
                    echo Html::a(Yii::t('app', 'Delete'), ['competicion/deletefoto', 'id' => $model->com_id], ['class' => 'btn btn-xs btn-danger']) . '<p>';
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
        </div>
        <div class="col-xs-6">
            <?= $form->field($model, 'com_notas')->textarea(['maxlength' => true, 'rows' => 5]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
