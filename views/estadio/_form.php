<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Ciudad;

/* @var $this yii\web\View */
/* @var $model app\models\Estadio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estadio-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'est_nombre')->textInput(['maxlength' => true]) ?>

    <div  class="row">
        <div class="col-xs-5">
            <?= $form->field($model, 'est_nombrecorto')->textInput(['maxlength' => true]) ?>      
        </div>
        <div class="col-xs-5">
            <?=
            $form->field($model, 'est_ciudad')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Ciudad::find()->orderBy('ciu_nombre')->all(), 'ciu_id', 'ciu_nombre'),
                'language' => 'es',
                'options' => ['placeholder' => Yii::t('app', 'Select one city')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-xs-2">
            <?= $form->field($model, 'est_aforo')->textInput(['type' => 'text', 'maxlength' => 5]) ?>
        </div>
    </div>

    <br>
    <div class="panel panel-success ">
        <div class="panel-heading" style="font-weight:bold;"><?= Yii::t('app', 'Image') ?></div>
        <div class="panel-body">
            <div class="col-md-1" style="text-align: left"><br>

                <?php
                if ($model->est_imagen) {
                    echo '<center>';
                    echo '<img src="' . \Yii::$app->request->baseUrl . '/' . $model->est_imagen . '" width="40px">';
                    echo '<br><br>';
                    echo Html::a(Yii::t('app', 'Delete'), ['estadio/deletefoto', 'id' => $model->est_id], ['class' => 'btn btn-xs btn-danger']) . '<p>';
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

    <?= $form->field($model, 'est_datos')->textarea(['maxlength' => true, 'rows' => 2]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
