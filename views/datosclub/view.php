<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Datosclub */

$this->title = Yii::$app->name . ' - ' . $model->datClub->clu_nomcorto;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Club dates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->datClub->clu_nomcorto;
\yii\web\YiiAsset::register($this);
?>
<div class="datosclub-view">

    <h3><?= Html::encode($model->datClub->clu_nomcorto.' / '.$model->datTemporada->temporadacompleta) ?></h3><br>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->dat_id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->dat_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <div class="row">
        <div class="col-md-6">
    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
//            [
//                'attribute' => 'datClub.clu_nomcorto',
//                'label' => Yii::t('app', 'Club'),
//            ],
//            [
//                'attribute' => 'datTemporada.temporadacompleta',
//                'label' => Yii::t('app', 'Season'),
//            ],
            'dat_socios',
            [
                'attribute' => 'dat_camiseta',
                'value' => function ($model) {
                    if (!empty($model->dat_camiseta)) {
                        return $model->dat_camiseta;
                    } else {
                        return "uploads/camiseta/nodefinido.jpg";
                    }
                },
                'format' => ['image', ['height' => '25']],
            ],
            'dat_patrocinador',
            'dat_notas',

        ],
    ]) ?>
        </div>
        <div class="col-md-6">
    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'dat_presupuesto',
            [
                'attribute' => 'dat_camiseta2',
                'value' => function ($model) {
                    if (!empty($model->dat_camiseta2)) {
                        return $model->dat_camiseta2;
                    } else {
                        return "uploads/camisetados/nodefinido.jpg";
                    }
                },
                'format' => ['image', ['height' => '25']],
            ],
            [
                'attribute' => 'dat_imagenpatro',
                'value' => function ($model) {
                    if (!empty($model->dat_imagenpatro)) {
                        return $model->dat_imagenpatro;
                    } else {
                        return "uploads/patrocinador/nodefinido.jpg";
                    }
                },
                'format' => ['image', ['height' => '25']],
            ],
            [
                'attribute' => 'dat_create_at',
                'value' => $model->dat_create_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
            [
                'attribute' => 'dat_update_at',
                'value' => $model->dat_update_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
        ],
    ]) ?>
        </div>
    </div>

            
    <p>
        <br>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </p>

</div>

