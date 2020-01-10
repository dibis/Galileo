<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-index">

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

<?=
            
GridView::widget([
    'dataProvider' => $dataProvider,
    'tableOptions' => ['class' => 'table table-striped'],
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        //'id',
        'username',
        //'auth_key',
        //'password_hash',
        //'password_reset_token',
        'email:email',
        //'status',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    if ($model->status == 10) {
                        return 'Activo';
                    } else {
                        return 'Inactivo';
                    }
                },
            ],

        'itemAssignments.item_name',
        //'created_at',
        [
            'attribute' => 'created_at',
            'format' => ['DateTime', 'php:d-m-Y']
        ],
        //'updated_at',
            ['class' => 'yii\grid\ActionColumn',
             'contentOptions' => ['style' => 'width:130px;'],
             'template' => '{view} {update} {change} {permisos} {delete}',
             'buttons' => [
                    //view button
                    'view' => function ($url, $model) {
                        return  Html::a('<i class="glyphicon glyphicon-eye-open"></i>', $url, 
                        [ 'title' => Yii::t('app', 'View')]) ;
                    },
                    'update' => function ($url, $model) {
                        return  Html::a('<i class="glyphicon glyphicon-pencil"></i>', $url, 
                        [ 'title' => Yii::t('app', 'Update')]) ;
                    },
                    'change' => function ($url, $model) {
                        return  Html::a('<i class="glyphicon glyphicon-lock"></i>', $url, 
                        [ 'title' => 'Cambiar contraseña']) ;
                    },
                    'permisos' => function ($url, $model) {
                        return  Html::a('<i class="glyphicon glyphicon-user"></i>', $url, 
                        [ 'title' => 'Asignar permisos']) ;
                    },
                    'delete' => function($url, $model){
                        return Html::a('<i class="glyphicon glyphicon-trash"></i>', ['delete', 'id' => $model->id], [
                            'title' => 'Eliminar',
                            'data' => [
                                'confirm' => '¿Está seguro de querer eliminar el registro?.',
                                'method' => 'post',
                            ],
                        ]);
                    },

                ],
            'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url = \yii\helpers\Url::toRoute(['usuarios/view', 'id' => $key]);
                        return $url;
                    }
                    elseif ($action === 'update') {
                        $url = \yii\helpers\Url::toRoute(['usuarios/update', 'id' => $key]);
                        return $url;
                    }
                    elseif ($action === 'change') {
                        $url = \yii\helpers\Url::toRoute(['usuarios/change', 'id' => $key]);
                        return $url;
                    }
                    elseif ($action === 'permisos') {
                        $url = \yii\helpers\Url::toRoute(['usuarios/permisos', 'id' => $key]);
                        return $url;
                    }
                }
            ],
        ],
        'tableOptions' =>['class' => 'table table-striped'],               

]);
?>
</div>
