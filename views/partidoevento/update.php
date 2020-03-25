<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Partidoevento */

$this->title = Yii::t('app', 'Update Partidoevento: {name}', [
    'name' => $model->pae_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Partidoeventos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pae_id, 'url' => ['view', 'id' => $model->pae_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="partidoevento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
