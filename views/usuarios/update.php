<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\usuarios */

$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usuarios-update">

    <?= $this->render('_formupdate', [
        'model' => $model,
    ]) ?>

</div>
