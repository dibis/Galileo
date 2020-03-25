<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Clasificacionalt */

$this->title = Yii::t('app', 'Update Clasificacionalt: {name}', [
    'name' => $model->cla_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clasificacionalts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cla_id, 'url' => ['view', 'id' => $model->cla_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="clasificacionalt-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
