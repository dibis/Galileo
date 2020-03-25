<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searchs\ClubSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="club-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'clu_id') ?>

    <?= $form->field($model, 'clu_nombre') ?>

    <?= $form->field($model, 'clu_nomcorto') ?>

    <?= $form->field($model, 'clu_propio') ?>

    <?= $form->field($model, 'clu_codigofex') ?>

    <?php // echo $form->field($model, 'clu_escudo') ?>

    <?php // echo $form->field($model, 'clu_ciudad') ?>

    <?php // echo $form->field($model, 'clu_direccion') ?>

    <?php // echo $form->field($model, 'clu_anofundacion') ?>

    <?php // echo $form->field($model, 'clu_desaparecido') ?>

    <?php // echo $form->field($model, 'clu_anodesaparicion') ?>

    <?php // echo $form->field($model, 'clu_datos') ?>

    <?php // echo $form->field($model, 'clu_equipacion') ?>

    <?php // echo $form->field($model, 'clu_imageequipac') ?>

    <?php // echo $form->field($model, 'clu_create_at') ?>

    <?php // echo $form->field($model, 'clu_update_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
