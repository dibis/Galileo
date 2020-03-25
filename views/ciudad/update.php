<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ciudad */

$this->title = Yii::t('app', 'Update Ciudad: {name}', [
    'name' => $model->ciu_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ciudads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ciu_id, 'url' => ['view', 'id' => $model->ciu_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ciudad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
