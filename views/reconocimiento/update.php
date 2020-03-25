<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Reconocimiento */

$this->title = Yii::t('app', 'Update Reconocimiento: {name}', [
    'name' => $model->rec_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reconocimientos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rec_id, 'url' => ['view', 'id' => $model->rec_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="reconocimiento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
