<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Club;
use app\models\Temporada;

/* @var $this yii\web\View */
/* @var $model app\models\Datosclub */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="datosclub-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div  class="row">
        <div class="col-xs-4">
            <?=
            $form->field($model, 'dat_club')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Club::find()->orderBy('clu_nomcorto')->all(), 'clu_id', 'clu_nomcorto'),
                'language' => 'es',
                'size' => Select2::SIZE_LARGE,
                'options' => ['placeholder' => Yii::t('app', 'Select one club')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-xs-4">
            <?=
            $form->field($model, 'dat_temporada')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Temporada::find()->orderBy('tem_inicio')->all(), 'tem_id', 'temporadacompleta'),
                'language' => 'es',
                'size' => Select2::SIZE_LARGE,
                'options' => ['placeholder' => Yii::t('app', 'Select one season')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-xs-2">
            <?= $form->field($model, 'dat_socios')->textInput(['type' => 'text', 'maxlength' => 4]) ?>
        </div>
        <div class="col-xs-2">
            <?= $form->field($model, 'dat_presupuesto')->textInput(['type' => 'text', 'maxlength' => 9]) ?>
        </div>
    </div>


    <ul class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a data-toggle="tab" href="#one"><?= Yii::t('app', 'Tshirts') ?></a></li>
        <li><a data-toggle="tab" href="#two"><?= Yii::t('app', 'Sponsor') ?></a></li>
        <li><a data-toggle="tab" href="#three"><?= Yii::t('app', 'Annotations') ?></a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="one"><br>
            <div  class="row">
                <div class="col-xs-6">
                    <div class="panel panel-success ">
                        <div class="panel-heading" style="font-weight:bold;"><?= Yii::t('app', 'Equipment') ?></div>
                        <div class="panel-body">
                            <div class="col-md-1" style="text-align: left"><br>

                                <?php
                                if ($model->dat_camiseta) {
                                    echo '<center>';
                                    echo '<img src="' . \Yii::$app->request->baseUrl . '/' . $model->dat_camiseta . '" height="40px">';
                                    echo '<br><br>';
                                    echo Html::a(Yii::t('app', 'Delete'), ['datosclub/deletefoto', 'id' => $model->dat_id], ['class' => 'btn btn-xs btn-danger']) . '<p>';
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
                    <div class="panel panel-success ">
                        <div class="panel-heading" style="font-weight:bold;"><?= Yii::t('app', 'Equipment 2ª') ?></div>
                        <div class="panel-body">
                            <div class="col-md-1" style="text-align: left"><br>

                                <?php
                                if ($model->dat_camiseta2) {
                                    echo '<center>';
                                    echo '<img src="' . \Yii::$app->request->baseUrl . '/' . $model->dat_camiseta2 . '" height="40px">';
                                    echo '<br><br>';
                                    echo Html::a(Yii::t('app', 'Delete'), ['datosclub/deletefoto2', 'id' => $model->dat_id], ['class' => 'btn btn-xs btn-danger']) . '<p>';
                                    echo '</center>';
                                }
                                ?>

                            </div>
                            <div class="col-md-1"><br></div>
                            <div class="col-md-4" style="text-align: left"><br>

                                <?= $form->field($model, 'file2')->fileInput(['class' => 'btn btn-success'])->label(false) ?>

                            </div>

                            <div class="col-md-1"><br></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="two"><br>

            <?= $form->field($model, 'dat_patrocinador')->textInput(['maxlength' => true]) ?>


            <div class="panel panel-success ">
                <div class="panel-heading" style="font-weight:bold;"><?= Yii::t('app', 'Image sponsor') ?></div>
                <div class="panel-body">
                    <div class="col-md-1" style="text-align: left"><br>

                        <?php
                        if ($model->dat_imagenpatro) {
                            echo '<center>';
                            echo '<img src="' . \Yii::$app->request->baseUrl . '/' . $model->dat_imagenpatro . '" height="40px">';
                            echo '<br><br>';
                            echo Html::a(Yii::t('app', 'Delete'), ['datosclub/deletefoto3', 'id' => $model->dat_id], ['class' => 'btn btn-xs btn-danger']) . '<p>';
                            echo '</center>';
                        }
                        ?>

                    </div>
                    <div class="col-md-1"><br></div>
                    <div class="col-md-4" style="text-align: left"><br>

                        <?= $form->field($model, 'file3')->fileInput(['class' => 'btn btn-success'])->label(false) ?>

                    </div>

                    <div class="col-md-1"><br></div>
                </div>
            </div>

        </div>
        <div class="tab-pane" id="three"><br>
            <?= $form->field($model, 'dat_notas')->textarea(['maxlength' => true, 'rows' => 4]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

