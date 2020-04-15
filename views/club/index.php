<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\searchs\ClubSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'Management of').' '.Yii::t('app', 'Club');
$this->params['breadcrumbs'][] = Yii::t('app', 'Club');
?>
<div class="club-index">

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

            [
                'attribute' => 'clu_escudo',
                'value' => function ($model) {
                    if (!empty($model->clu_escudo)) {
                        return $model->clu_escudo;
                    } else {
                        return "uploads/escudo/nodefinido.jpg";
                    }
                },
                'format' => ['image', ['height' => '25']],
            ],
            [
                'attribute' => 'clu_imageequipac',
                'value' => function ($model) {
                    if (!empty($model->clu_imageequipac)) {
                        return $model->clu_imageequipac;
                    } else {
                        return "uploads/equipacion/nodefinido.jpg";
                    }
                },
                'format' => ['image', ['height' => '25']],
            ],
            'clu_nombre',
            //'clu_nomcorto',
            [
                'attribute' => 'clu_propio',
                'label' => Yii::t('app', 'Own'),
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->clu_propio == 1 ?
                            '<span style="color:green">✔</i></span>':
                            '<span style="color:red">✘</i></span>';
                },
            ],
            'clu_codigofex',
            'cluCiudad.ciu_nombre',
            //'clu_direccion',
            //'clu_anofundacion',
//            [
//                'attribute' => 'clu_desaparecido',
//                'label' => Yii::t('app', 'Extinct'),
//                'format' => 'raw',
//                'value' => function ($model) {
//                    return $model->clu_desaparecido == 1 ?
//                            '<span style="color:red">Si</i></span>':
//                            '<span style="color:green">No</i></span>';
//                },
//            ],
            //'clu_anodesaparicion',
            //'clu_datos:ntext',

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
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>'.' '. Yii::t('app', 'Delete'), ['delete', 'id' => $model->clu_id], [
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
                        $url = \yii\helpers\Url::toRoute(['club/view', 'id' => $key]);
                        return $url;
                    } elseif ($action === 'update') {
                        $url = \yii\helpers\Url::toRoute(['club/update', 'id' => $key]);
                        return $url;
                    }
                }
            ],
        ],
        'tableOptions' => ['class' => 'table table-striped'],
    ]);
    ?>
</div>


