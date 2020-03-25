<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Articulo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articulo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'art_titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'art_categoría')->textInput() ?>

    <?= $form->field($model, 'art_articulocorto')->textInput() ?>

    <?= $form->field($model, 'art_destacado')->textInput() ?>

    <?= $form->field($model, 'art_contenido')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'art_publicado')->textInput() ?>

    <?= $form->field($model, 'art_iniciopubli')->textInput() ?>

    <?= $form->field($model, 'art_finpubli')->textInput() ?>

    <?= $form->field($model, 'art_user')->textInput() ?>

    <?= $form->field($model, 'art_create_at')->textInput() ?>

    <?= $form->field($model, 'art_update_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
