<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\searchs\PersonaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'Management of').' '.Yii::t('app', 'Person');
$this->params['breadcrumbs'][] = Yii::t('app', 'Person');
?>
<div class="persona-index">

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

            'per_nombre',
            'per_apellidos',
            'per_apodo',
//            [
//                'attribute' => 'per_genero',
//                'format' => 'raw',
//                'value' => function ($model) {
//                    return $model->per_genero == 0 ?
//                            '<span style="color:blue">H</i></span>':
//                            '<span style="color:fuchsia">M</i></span>';
//                },
//            ],
            [
                'attribute' => 'per_fechanacim',
                'value' => 'per_fechanacim',
                'format' => ['date', 'php: d-m-Y'],
            ],
            'perLocalidad.ciu_nombre',
//            [
//                'attribute' => 'per_fallecido',
//                'format' => 'raw',
//                'value' => function ($model) {
//                    return $model->per_fallecido == 0 ?
//                            '<span style="color:fuchsia">♥</i></span>' :
//                            '<span style="color:black">†</i></span>';
//                },
//            ],
            [
                'attribute' => 'per_imagengeneral',
                'value' => function ($model) {
                    if (!empty($model->per_imagengeneral)) {
                        return $model->per_imagengeneral;
                    } else {
                        return "uploads/persona/nodefinido.jpg";
                    }
                },
                'format' => ['image', ['height' => '25']],
            ],
//            [
//                'attribute' => 'per_create_at',
//                'value' => 'per_create_at',
//                'format' => ['date', 'php: d-m-Y'],
//            ],
            ['class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:240px;'],
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    //view button
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>'.' '. Yii::t('app', 'View'), $url,
                                        ['title' => Yii::t('app', 'View'), 'class' => 'btn btn-primary btn-xs',]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>'.' '. Yii::t('app', 'Update'), $url,
                                        ['title' => Yii::t('app', 'Update'), 'class' => 'btn btn-warning btn-xs',]);
                    },
                    'delete' => function($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>'.' '. Yii::t('app', 'Delete'), ['delete', 'id' => $model->per_id], [
                                    'class' => 'btn btn-danger btn-xs',
                                    'data' => [
                                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                        'method' => 'post',
                                    ],
                        ]);
                    }
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url = \yii\helpers\Url::toRoute(['persona/view', 'id' => $key]);
                        return $url;
                    } elseif ($action === 'update') {
                        $url = \yii\helpers\Url::toRoute(['persona/update', 'id' => $key]);
                        return $url;
                    }
                }
            ],
        ],
        'tableOptions' => ['class' => 'table table-striped'],
    ]);
    ?>
</div>

