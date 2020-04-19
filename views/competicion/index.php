<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\searchs\CompeticionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'Management of').' '.Yii::t('app', 'Competition');
$this->params['breadcrumbs'][] = Yii::t('app', 'Stadium');
?>
<div class="competicion-index">

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

            'comTipocompeticion.tip_nombre',
            'comDivision.div_nombre',
            'com_grupo',
            'comLicencia.lic_nombre',
            [
                'attribute' => 'com_temporada',
                'value' => function ($model) {
                    if (!empty($model->com_temporada)) {
                        return $model->comTemporada->tem_inicio.' - '.$model->comTemporada->tem_final;
                    } else {
                        return "";
                    }
                },
            ],
            'com_numeroequipos',

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
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>'.' '. Yii::t('app', 'Delete'), ['delete', 'id' => $model->com_id], [
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
                        $url = \yii\helpers\Url::toRoute(['competicion/view', 'id' => $key]);
                        return $url;
                    } elseif ($action === 'update') {
                        $url = \yii\helpers\Url::toRoute(['competicion/update', 'id' => $key]);
                        return $url;
                    }
                }
            ],
        ],
        'tableOptions' => ['class' => 'table table-striped'],
    ]);
    ?>
</div>

