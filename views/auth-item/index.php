<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AuthItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Items de permisos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-index">

    <br>
    <div class="inline">

        <div class="col-xs-3">

            <?= Html::a('Nuevo', ['create'], ['class' => 'btn btn-success']) ?>

        </div>

        <div class="col-xs-5"></div>

        <div class="col-xs-4">

            <?php
            echo $this->render('_search', ['model' => $searchModel]);
            ?> 

        </div>

        <div style="clear: both"></div>

    </div><br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' =>['class' => 'table table-striped'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'type',
            'description:ntext',
            //'rule_name',
            //'data:ntext',
            //'created_at',
            //'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['width' => '80px;'],
            ],
        ],
    ]); ?>
</div>
