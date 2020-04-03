<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
use app\models\Licencia;

/* @var $this yii\web\View */
/* @var $model app\models\Division */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="division-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'div_nombre')->textInput(['maxlength' => true]) ?>

    <div  class="row">
        <div class="col-xs-6">
            <?=
            $form->field($model, 'div_licencia')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Licencia::find()->orderBy('lic_nombre')->all(), 'li_id', 'lic_nombre'),
                'language' => 'es',
                'options' => ['placeholder' => Yii::t('app', 'Select one license')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-xs-6">
            <?= $form->field($model, 'div_rango')->textInput() ?>
        </div>
    </div>

    <?= $form->field($model, 'div_notas')->textarea(['maxlength' => true, 'rows' => 2]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

