<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Estadioclub */

$this->title = Yii::t('app', 'Update Estadioclub: {name}', [
    'name' => $model->escl_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estadioclubs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->escl_id, 'url' => ['view', 'id' => $model->escl_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="estadioclub-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
