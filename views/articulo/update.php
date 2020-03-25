<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Articulo */

$this->title = Yii::t('app', 'Update Articulo: {name}', [
    'name' => $model->art_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Articulos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->art_id, 'url' => ['view', 'id' => $model->art_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="articulo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
