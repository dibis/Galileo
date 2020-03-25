<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Estadioclub */

$this->title = $model->escl_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estadioclubs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="estadioclub-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->escl_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->escl_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'escl_id',
            'escl_estadio',
            'escl_club',
            'escl_actual',
            'escl_temporadainicio',
            'escl_temporadafin',
            'escl_notas',
            'escl_create_at',
            'escl_update_at',
        ],
    ]) ?>

</div>
