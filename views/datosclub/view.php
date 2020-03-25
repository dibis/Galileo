<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Datosclub */

$this->title = $model->dat_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Datosclubs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="datosclub-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->dat_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->dat_id], [
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
            'dat_id',
            'dat_club',
            'dat_temporada',
            'dat_socios',
            'dat_presupuesto',
            'dat_camiseta',
            'dat_camiseta2',
            'dat_patrocinador',
            'dat_imagenpatro',
            'dat_notas',
            'dat_create_at',
            'dat_update_at',
        ],
    ]) ?>

</div>
