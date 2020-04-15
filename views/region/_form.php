<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Pais;

/* @var $this yii\web\View */
/* @var $model app\models\Region */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="region-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'reg_nombre')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'reg_pais')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Pais::find()->orderBy('pai_nombre')->all(), 'pai_id', 'pai_nombre'),
        'language' => 'es',
        'options' => ['placeholder' => Yii::t('app', 'Select one country')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <br>
    <div class="panel panel-success ">
        <div class="panel-heading" style="font-weight:bold;"><?= Yii::t('app', 'Image') ?></div>
        <div class="panel-body">
            <div class="col-md-1" style="text-align: left"><br>

                <?php
                if ($model->reg_bandera) {
                    echo '<center>';
                    echo '<img src="' . \Yii::$app->request->baseUrl . '/' . $model->reg_bandera . '" width="40px">';
                    echo '<br><br>';
                    echo Html::a(Yii::t('app', 'Delete'), ['region/deletefoto', 'id' => $model->reg_id], ['class' => 'btn btn-xs btn-danger']) . '<p>';
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
    </div><br><br><br>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
