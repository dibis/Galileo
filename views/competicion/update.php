<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Competicion */

$this->title = Yii::t('app', 'Update Competicion: {name}', [
    'name' => $model->com_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Competicions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->com_id, 'url' => ['view', 'id' => $model->com_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="competicion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
