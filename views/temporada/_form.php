<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\checkbox\CheckboxX;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Temporada */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="temporada-form">

    <?php $form = ActiveForm::begin(); ?>

        <?=
        $form->field($model, 'tem_inicio')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => Yii::t('app', 'Select start year')],
            'pluginOptions' => [
                'autoclose' => true,
                'minViewMode' => 'years',
                'format' => 'yyyy',
            ]
        ]);
        ?>  

        <?=
        $form->field($model, 'tem_final')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => Yii::t('app', 'Select the final year')],
            'pluginOptions' => [
                'autoclose' => true,
                'minViewMode' => 'years',
                'format' => 'yyyy',
            ]
        ]);
        ?>  

    <br>
    
        <?=
        $form->field($model, 'tem_activa')->widget(CheckboxX::classname(), [
            'initInputType' => CheckboxX::INPUT_CHECKBOX,
            'autoLabel' => true
        ])->label(false);
        ?>

    <br>



    <br>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
