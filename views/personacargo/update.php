<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Personacargo */

$this->title = Yii::t('app', 'Update Personacargo: {name}', [
    'name' => $model->pec_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Personacargos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pec_id, 'url' => ['view', 'id' => $model->pec_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="personacargo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
