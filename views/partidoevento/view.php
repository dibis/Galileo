<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Partidoevento */

$this->title = $model->pae_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Partidoeventos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="partidoevento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->pae_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->pae_id], [
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
            'pae_id',
            'pae_partido',
            'pae_personacargo',
            'pae_evento',
            'pae_minuto',
            'pae_cantidad',
            'pae_especial',
            'pae_create_at',
            'pae_update_at',
        ],
    ]) ?>

</div>
