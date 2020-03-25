<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\searchs\CompeticionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Competicions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="competicion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Competicion'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'com_id',
            'com_nombre',
            'com_tipocompeticion',
            'com_temporada',
            'com_licencia',
            //'com_grupo',
            //'com_division',
            //'com_numeroequipos',
            //'com_imagen',
            //'com_notas',
            //'com_create_at',
            //'com_update_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
