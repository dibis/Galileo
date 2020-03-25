<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\searchs\PartidoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Partidos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partido-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Partido'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'par_id',
            'par_jornada',
            'par_equipo1',
            'par_equipo2',
            'par_resultado1',
            //'par_resultado2',
            //'par_quiniela',
            //'par_jugado',
            //'par_fecha',
            //'par_hora',
            //'par_aplazado',
            //'par_estadio',
            //'par_notas',
            //'par_cronica:ntext',
            //'par_sancion1equipo',
            //'par_sancion2equipo',
            //'par_create_at',
            //'par_update_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
