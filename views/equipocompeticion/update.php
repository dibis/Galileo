<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Equipocompeticion */

$this->title = Yii::t('app', 'Update Equipocompeticion: {name}', [
    'name' => $model->eqc_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Equipocompeticions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->eqc_id, 'url' => ['view', 'id' => $model->eqc_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="equipocompeticion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
