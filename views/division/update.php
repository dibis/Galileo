<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Division */

$this->title = Yii::t('app', 'Update Division: {name}', [
    'name' => $model->div_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Divisions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->div_id, 'url' => ['view', 'id' => $model->div_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="division-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
