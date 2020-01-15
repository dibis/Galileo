<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\usuarios */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="usuarios-update">

    <?= $this->render('_formupdate', [
        'model' => $model,
        'nivel' => $nivel,
        'identity' => $identity,
    ]) ?>

</div>
