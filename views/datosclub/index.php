<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\searchs\DatosclubSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Datosclubs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datosclub-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Datosclub'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'dat_id',
            'dat_club',
            'dat_temporada',
            'dat_socios',
            'dat_presupuesto',
            //'dat_camiseta',
            //'dat_camiseta2',
            //'dat_patrocinador',
            //'dat_imagenpatro',
            //'dat_notas',
            //'dat_create_at',
            //'dat_update_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
