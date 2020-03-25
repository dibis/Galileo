<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\searchs\ClubSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Clubs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="club-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Club'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'clu_id',
            'clu_nombre',
            'clu_nomcorto',
            'clu_propio',
            'clu_codigofex',
            //'clu_escudo',
            //'clu_ciudad',
            //'clu_direccion',
            //'clu_anofundacion',
            //'clu_desaparecido',
            //'clu_anodesaparicion',
            //'clu_datos:ntext',
            //'clu_equipacion',
            //'clu_imageequipac',
            //'clu_create_at',
            //'clu_update_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
