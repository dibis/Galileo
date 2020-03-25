<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\searchs\ArticuloSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articulo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'art_id') ?>

    <?= $form->field($model, 'art_titulo') ?>

    <?= $form->field($model, 'art_categoría') ?>

    <?= $form->field($model, 'art_articulocorto') ?>

    <?= $form->field($model, 'art_destacado') ?>

    <?php // echo $form->field($model, 'art_contenido') ?>

    <?php // echo $form->field($model, 'art_publicado') ?>

    <?php // echo $form->field($model, 'art_iniciopubli') ?>

    <?php // echo $form->field($model, 'art_finpubli') ?>

    <?php // echo $form->field($model, 'art_user') ?>

    <?php // echo $form->field($model, 'art_create_at') ?>

    <?php // echo $form->field($model, 'art_update_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
