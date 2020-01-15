<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\usuarios */


$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $user->username, 'url' => ['view', 'id' => $user->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update password');
?>
<div class="usuarios-create">

    <?= $this->render('_change', [
        'user' => $user,
    ]) ?>

</div>
