<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jornada */

$this->title = Yii::t('app', 'Update Jornada: {name}', [
    'name' => $model->jor_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jornadas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jor_id, 'url' => ['view', 'id' => $model->jor_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="jornada-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
