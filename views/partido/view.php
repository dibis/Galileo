<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Partido */

$this->title = $model->par_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Partidos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="partido-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->par_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->par_id], [
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
            'par_id',
            'par_jornada',
            'par_equipo1',
            'par_equipo2',
            'par_resultado1',
            'par_resultado2',
            'par_quiniela',
            'par_jugado',
            'par_fecha',
            'par_hora',
            'par_aplazado',
            'par_estadio',
            'par_notas',
            'par_cronica:ntext',
            'par_sancion1equipo',
            'par_sancion2equipo',
            'par_create_at',
            'par_update_at',
        ],
    ]) ?>

</div>
