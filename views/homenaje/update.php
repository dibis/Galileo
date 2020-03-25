<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Homenaje */

$this->title = Yii::t('app', 'Update Homenaje: {name}', [
    'name' => $model->hom_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Homenajes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->hom_id, 'url' => ['view', 'id' => $model->hom_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="homenaje-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
