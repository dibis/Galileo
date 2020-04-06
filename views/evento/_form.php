<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Evento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="evento-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div  class="row">
        <div class="col-xs-8">
            <?= $form->field($model, 'eve_nombre')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'eve_abreviatura')->textInput(['maxlength' => true, 'style' => 'text-transform: uppercase']) ?>
        </div>
    </div>
    
    <br>
    <div class="panel panel-success ">
        <div class="panel-heading" style="font-weight:bold;"><?= Yii::t('app', 'Image')?></div>
        <div class="panel-body">
            <div class="col-md-1" style="text-align: left"><br>

                    <?php
                    if ($model->eve_imagen) {
                        echo '<center>';
                        echo '<img src="' . \Yii::$app->request->baseUrl . '/' . $model->eve_imagen . '" width="40px">';
                        echo '<br><br>';
                        echo Html::a(Yii::t('app', 'Delete'), ['evento/deletefoto', 'id' => $model->eve_id], ['class' => 'btn btn-xs btn-danger']) . '<p>';
                        echo '</center>'; 
                    }
                    ?>

            </div>
            <div class="col-md-1"><br></div>
            <div class="col-md-4" style="text-align: left"><br>

                <?= $form->field($model, 'file')->fileInput(['class' =>'btn btn-success'])->label(false) ?>

            </div>

            <div class="col-md-1"><br></div>
        </div>
        </div>

    <?= $form->field($model, 'eve_descripcion')->textarea(['maxlength' => true, 'rows' => 2]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
