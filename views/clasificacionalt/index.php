<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\searchs\ClasificacionaltSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Clasificacionalts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clasificacionalt-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Clasificacionalt'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cla_id',
            'cla_competicion',
            'cla_equipocomp',
            'cla_posicion',
            'cla_jugados',
            //'cla_victorias',
            //'cla_empates',
            //'cla_derrotas',
            //'cla_golesfavor',
            //'cla_golescontra',
            //'cla_puntos',
            //'cla_puntossancion',
            //'cla_notas',
            //'cla_create_at',
            //'cla_update_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
