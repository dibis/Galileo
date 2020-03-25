<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Temporada */

$this->title = Yii::t('app', 'Update Temporada: {name}', [
    'name' => $model->tem_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Temporadas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tem_id, 'url' => ['view', 'id' => $model->tem_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="temporada-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
