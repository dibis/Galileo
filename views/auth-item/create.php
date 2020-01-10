<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AuthItem */

$this->title = 'Nuevo item de permisos';
$this->params['breadcrumbs'][] = ['label' => 'Items de permisos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
