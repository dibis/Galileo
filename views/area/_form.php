<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Area */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="area-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div><br>
        <div  class="row">
            <div class="col-xs-4">
                <?= $form->field($model, 'are_nombre')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-4">
                <?= $form->field($model, 'are_abreviatura')->textInput(['maxlength' => true, 'style' => 'text-transform: uppercase']) ?>
            </div>
            <div class="col-xs-4">
                <?= $form->field($model, 'are_nivel')->textInput(['maxlength' => true]) ?>
            </div>
        </div><br>
        <div class="row">

            <div class="col-xs-6">    

                <div class="panel panel-success ">
                    <div class="panel-heading" style="font-weight:bold;"><?= Yii::t('app', 'Image') ?></div>
                    <div class="panel-body">
                        <div class="col-xs-1" style="text-align: left"><br>

                            <?php
                            if ($model->are_imagen) {
                                echo '<center>';
                                echo '<img src="' . \Yii::$app->request->baseUrl . '/' . $model->are_imagen . '" width="40px">';
                                echo '<br><br>';
                                echo Html::a(Yii::t('app', 'Delete'), ['area/deletefoto', 'id' => $model->are_id], ['class' => 'btn btn-xs btn-danger']) . '<p>';
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

            </div>

            <div class="col-xs-6">
                <?= $form->field($model, 'are_notas')->textarea(['maxlength' => true, 'rows' => 2]) ?>
            </div>

        </div>

    </div><br>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
