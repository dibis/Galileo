<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\searchs\ArticuloSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Articulos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articulo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Articulo'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'art_id',
            'art_titulo',
            'art_categoría',
            'art_articulocorto',
            'art_destacado',
            //'art_contenido:ntext',
            //'art_publicado',
            //'art_iniciopubli',
            //'art_finpubli',
            //'art_user',
            //'art_create_at',
            //'art_update_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
