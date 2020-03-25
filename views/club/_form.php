<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Club */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="club-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'clu_nombre')->textInput() ?>

    <?= $form->field($model, 'clu_nomcorto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clu_propio')->textInput() ?>

    <?= $form->field($model, 'clu_codigofex')->textInput() ?>

    <?= $form->field($model, 'clu_escudo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clu_ciudad')->textInput() ?>

    <?= $form->field($model, 'clu_direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clu_anofundacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clu_desaparecido')->textInput() ?>

    <?= $form->field($model, 'clu_anodesaparicion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clu_datos')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'clu_equipacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clu_imageequipac')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clu_create_at')->textInput() ?>

    <?= $form->field($model, 'clu_update_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
