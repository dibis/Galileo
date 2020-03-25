<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Region */

$this->title = Yii::t('app', 'Update Region: {name}', [
    'name' => $model->reg_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Regions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->reg_id, 'url' => ['view', 'id' => $model->reg_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="region-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
