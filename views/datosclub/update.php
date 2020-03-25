<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Datosclub */

$this->title = Yii::t('app', 'Update Datosclub: {name}', [
    'name' => $model->dat_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Datosclubs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->dat_id, 'url' => ['view', 'id' => $model->dat_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="datosclub-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
