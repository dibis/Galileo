<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\searchs\PersonacargoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Personacargos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personacargo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Personacargo'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pec_id',
            'pec_persona',
            'pec_cargo',
            'pec_temporada',
            'pec_imagen',
            //'pec_notas',
            //'pec_create_at',
            //'pec_update_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
