<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Clasificacionalt */

$this->title = $model->cla_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clasificacionalts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="clasificacionalt-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->cla_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->cla_id], [
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
            'cla_id',
            'cla_competicion',
            'cla_equipocomp',
            'cla_posicion',
            'cla_jugados',
            'cla_victorias',
            'cla_empates',
            'cla_derrotas',
            'cla_golesfavor',
            'cla_golescontra',
            'cla_puntos',
            'cla_puntossancion',
            'cla_notas',
            'cla_create_at',
            'cla_update_at',
        ],
    ]) ?>

</div>
