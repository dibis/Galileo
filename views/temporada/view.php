<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Temporada */

$this->title = Yii::$app->name . ' - '.Yii::t('app', 'Season').' '. $model->tem_inicio. ' - '.$model->tem_final;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Season'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->tem_inicio. ' - '.$model->tem_final;
\yii\web\YiiAsset::register($this);
?>
<div class="temporada-view">

    <h3><?= Html::encode(Yii::t('app', 'Season').' '.$model->tem_inicio. ' - '.$model->tem_final) ?></h3><br>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->tem_id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->tem_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'tem_inicio',
            'tem_final',
            [
                'attribute' => 'tem_activa',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->tem_activa == 0 ?
                            '<span style="color:red"><i class="glyphicon glyphicon-remove"></i></span>' :
                            '<span style="color:green"><i class="glyphicon glyphicon-ok"></i></span>';
                },
            ],
            [
                'attribute' => 'tem_create_at',
                'value' => $model->tem_create_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
            [
                'attribute' => 'tem_update_at',
                'value' => $model->tem_update_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
        ],
    ]) ?>
    
    <p>
        <br>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </p>

</div>
