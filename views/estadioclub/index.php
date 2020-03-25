<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\searchs\EstadioclubSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Estadioclubs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estadioclub-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Estadioclub'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'escl_id',
            'escl_estadio',
            'escl_club',
            'escl_actual',
            'escl_temporadainicio',
            //'escl_temporadafin',
            //'escl_notas',
            //'escl_create_at',
            //'escl_update_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
