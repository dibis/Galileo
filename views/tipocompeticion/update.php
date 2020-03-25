<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tipocompeticion */

$this->title = Yii::t('app', 'Update Tipocompeticion: {name}', [
    'name' => $model->tip_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipocompeticions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tip_id, 'url' => ['view', 'id' => $model->tip_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tipocompeticion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
