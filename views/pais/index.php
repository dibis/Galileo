<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\searchs\PaisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Country');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pais-index">

    <br>
    <div class="inline">

        <div class="col-xs-3">

            <?= Html::a(Yii::t('app', 'New'), ['create'], ['class' => 'btn btn-success']) ?>

        </div>

        <div class="col-xs-5"></div>

        <div class="col-xs-4">

            <?php
            echo $this->render('//site/interface/_search', ['model' => $searchModel]);
            ?> 

        </div>

        <div style="clear: both"></div>

    </div><br>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => ['class' => 'table table-striped'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'pai_id',
            'pai_nombre',
            'pai_bandera',
            'pai_create_at',
            //'pai_update_at',
            ['class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:190px;'],
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    //view button
                    'view' => function ($url, $model) {
                        return Html::a('<span class="fa fa-search"></span>' . Yii::t('app', 'View'), $url,
                                        ['title' => Yii::t('app', 'View'), 'class' => 'btn btn-primary btn-xs',]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('<span class="fa fa-pencil-square-o"></span>' . Yii::t('app', 'Update'), $url,
                                        ['title' => Yii::t('app', 'Update'), 'class' => 'btn btn-warning btn-xs',]);
                    },
                    'delete' => function($url, $model) {
                        return Html::a('<span class="fa fa-remove"></span>' . Yii::t('app', 'Delete'), ['delete', 'id' => $model->pai_id], [
                                    'class' => 'btn btn-danger btn-xs',
                                    'data' => [
                                        'confirm' => Yii::t('app', 'Are you sure?'),
                                        'method' => 'post',
                                    ],
                        ]);
                    }
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url = \yii\helpers\Url::toRoute(['pais/view', 'id' => $key]);
                        return $url;
                    } elseif ($action === 'update') {
                        $url = \yii\helpers\Url::toRoute(['pais/update', 'id' => $key]);
                        return $url;
                    }
                }
            ],
        ],
        'tableOptions' => ['class' => 'table table-striped'],
    ]);
    ?>
</div>
