<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Provincia */

$this->title = Yii::t('app', 'Update Provincia: {name}', [
    'name' => $model->pro_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Provincias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pro_id, 'url' => ['view', 'id' => $model->pro_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="provincia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
