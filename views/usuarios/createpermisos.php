<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\usuarios */

$this->title = 'Nuevo permisos';
$this->params['breadcrumbs'][] = ['label' => 'Permisos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_permisos', [
        'model' => $model,
    ]) ?>

</div>
