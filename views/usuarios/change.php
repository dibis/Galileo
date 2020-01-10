<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\usuarios */


$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $user->username, 'url' => ['view', 'id' => $user->id]];
$this->params['breadcrumbs'][] = 'Actualizar contraseña';
?>
<div class="usuarios-create">



    <?= $this->render('_change', [
        'user' => $user,
    ]) ?>

</div>
