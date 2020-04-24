<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\checkbox\CheckboxX;
use app\models\Ciudad;

/* @var $this yii\web\View */
/* @var $model app\models\Club */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="club-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div  class="row">
        <div class="col-xs-4">
            <?= $form->field($model, 'clu_nombre')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'clu_nomcorto')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-2" style="padding-top: 35px;">
            <?=
            $form->field($model, 'clu_propio')->widget(CheckboxX::classname(), [
                'initInputType' => CheckboxX::INPUT_CHECKBOX,
                'autoLabel' => true
            ])->label(false);
            ?>
        </div>
        <div class="col-xs-2">
            <?= $form->field($model, 'clu_codigofex')->textInput(['type' => 'text', 'maxlength' => 5]) ?>
        </div>
    </div>


    <ul class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a data-toggle="tab" href="#one"><?= Yii::t('app', 'Club dates') ?></a></li>
        <li><a data-toggle="tab" href="#two"><?= Yii::t('app', 'Emblems') ?></a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="one"><br>

            <?= $form->field($model, 'clu_direccion')->textInput(['maxlength' => true]) ?>

            <div  class="row">
                <div class="col-xs-6">
                    <?=
                    $form->field($model, 'clu_ciudad')->widget(Select2::classname(), [
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
                <div class="col-xs-2">
                    <?= $form->field($model, 'clu_anofundacion')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-xs-2" style="padding-top: 35px;">
                    <?=
                    $form->field($model, 'clu_desaparecido')->widget(CheckboxX::classname(), [
                        'initInputType' => CheckboxX::INPUT_CHECKBOX,
                        'autoLabel' => true
                    ])->label(false);
                    ?>
                </div>
                <div class="col-xs-2">
                    <?= $form->field($model, 'clu_anodesaparicion')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <?= $form->field($model, 'clu_datos')->textarea(['maxlength' => true, 'rows' => 2]) ?>

        </div>
        <div class="tab-pane" id="two"><br>

            <?=
            $form->field($model, 'clu_equipacion')->textInput(['maxlength' => true,
                'placeholder' => Yii::t('app', 'With text')])
            ?>

            <div  class="row">
                <div class="col-xs-6">
                    <div class="panel panel-success ">
                        <div class="panel-heading" style="font-weight:bold;"><?= Yii::t('app', 'Emblem') ?></div>
                        <div class="panel-body">
                            <div class="col-md-1" style="text-align: left"><br>

                                <?php
                                if ($model->clu_escudo) {
                                    echo '<center>';
                                    echo '<img src="' . \Yii::$app->request->baseUrl . '/' . $model->clu_escudo . '" height="40px">';
                                    echo '<br><br>';
                                    echo Html::a(Yii::t('app', 'Delete'), ['club/deletefoto', 'id' => $model->clu_id], ['class' => 'btn btn-xs btn-danger']) . '<p>';
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
                        <div class="panel-heading" style="font-weight:bold;"><?= Yii::t('app', 'Equipement') ?></div>
                        <div class="panel-body">
                            <div class="col-md-1" style="text-align: left"><br>

                                <?php
                                if ($model->clu_imageequipac) {
                                    echo '<center>';
                                    echo '<img src="' . \Yii::$app->request->baseUrl . '/' . $model->clu_imageequipac . '" height="40px">';
                                    echo '<br><br>';
                                    echo Html::a(Yii::t('app', 'Delete'), ['club/deletefoto2', 'id' => $model->clu_id], ['class' => 'btn btn-xs btn-danger']) . '<p>';
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
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
