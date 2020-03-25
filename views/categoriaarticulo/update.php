<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Categoriaarticulo */

$this->title = Yii::t('app', 'Update Categoriaarticulo: {name}', [
    'name' => $model->car_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categoriaarticulos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->car_id, 'url' => ['view', 'id' => $model->car_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="categoriaarticulo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
