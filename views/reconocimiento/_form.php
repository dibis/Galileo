<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Reconocimiento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reconocimiento-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div  class="row">
        <div class="col-xs-9">
            <?= $form->field($model, 'rec_nombre')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-3">
            <?= $form->field($model, 'rec_abreviatura')->textInput(['maxlength' => true, 'style' => 'text-transform: uppercase']) ?>
        </div>
    </div><br>

    <div class="panel panel-success ">
        <div class="panel-heading" style="font-weight:bold;"><?= Yii::t('app', 'Image') ?></div>
        <div class="panel-body">
            <div class="col-xs-1" style="text-align: left"><br>

                <?php
                if ($model->rec_imagen) {
                    echo '<center>';
                    echo '<img src="' . \Yii::$app->request->baseUrl . '/' . $model->rec_imagen . '" width="40px">';
                    echo '<br><br>';
                    echo Html::a(Yii::t('app', 'Delete'), ['reconocimiento/deletefoto', 'id' => $model->rec_id], ['class' => 'btn btn-xs btn-danger']) . '<p>';
                    echo '</center>';
                }
                ?>

            </div>
            <div class="col-xs-5"><br>

                <?= $form->field($model, 'file')->fileInput(['class' => 'btn btn-success'])->label(false) ?>

            </div>

            <div class="col-xs-6"><br></div>
        </div>
    </div>

    <?= $form->field($model, 'rec_notas')->textarea(['maxlength' => true, 'rows' => 2]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
