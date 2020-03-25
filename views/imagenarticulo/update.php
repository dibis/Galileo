<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Imagenarticulo */

$this->title = Yii::t('app', 'Update Imagenarticulo: {name}', [
    'name' => $model->imar_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Imagenarticulos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->imar_id, 'url' => ['view', 'id' => $model->imar_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="imagenarticulo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
