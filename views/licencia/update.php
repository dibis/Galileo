<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Licencia */

$this->title = Yii::t('app', 'Update Licencia: {name}', [
    'name' => $model->li_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Licencias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->li_id, 'url' => ['view', 'id' => $model->li_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="licencia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
