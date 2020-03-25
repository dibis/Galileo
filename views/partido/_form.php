<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Partido */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partido-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'par_jornada')->textInput() ?>

    <?= $form->field($model, 'par_equipo1')->textInput() ?>

    <?= $form->field($model, 'par_equipo2')->textInput() ?>

    <?= $form->field($model, 'par_resultado1')->textInput() ?>

    <?= $form->field($model, 'par_resultado2')->textInput() ?>

    <?= $form->field($model, 'par_quiniela')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'par_jugado')->textInput() ?>

    <?= $form->field($model, 'par_fecha')->textInput() ?>

    <?= $form->field($model, 'par_hora')->textInput() ?>

    <?= $form->field($model, 'par_aplazado')->textInput() ?>

    <?= $form->field($model, 'par_estadio')->textInput() ?>

    <?= $form->field($model, 'par_notas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'par_cronica')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'par_sancion1equipo')->textInput() ?>

    <?= $form->field($model, 'par_sancion2equipo')->textInput() ?>

    <?= $form->field($model, 'par_create_at')->textInput() ?>

    <?= $form->field($model, 'par_update_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
