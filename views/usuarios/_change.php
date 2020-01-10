<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \yii2mod\user\models\ResetPasswordForm */

?>
<div class="site-reset-password">
    <h1><?php echo Html::encode($this->title) ?></h1>

    <p><?php echo 'Entre la nueva contraseña:'; ?></p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'reset-password-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>
            <?php echo $form->field($user, 'password')->passwordInput() ?>
            <div class="form-group">
                <?php echo Html::submitButton(('Guardar'), ['class' => 'btn btn-primary']) ?>
                <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
