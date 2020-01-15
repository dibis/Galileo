<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\AuthAssignment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-assignment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'user_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(app\models\Usuarios::find()->orderBy('username')->all(), 'id', 'username'),
        'language' => 'es',
        'disabled' => true,
        'options' => ['placeholder' => Yii::t('app', 'Select user.....')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>
    
    <?=
    $form->field($model, 'item_name')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\app\models\AuthItem::find()->orderBy('name')->all(),
                'name', 'name'),
        'language' => 'es',
        'options' => ['placeholder' => Yii::t('app', 'Select rol.....')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>