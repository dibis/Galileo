<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Homenaje */

$this->title = Yii::$app->name . ' - ' . $model->homPersona->personacompleta;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tribute'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->homPersona->personacompleta;
\yii\web\YiiAsset::register($this);
?>
<div class="homenaje-view">

    <h3><?= Html::encode($model->homPersona->personacompleta) ?></h3><br>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->hom_id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->hom_id], [
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
            'homPersona.personacompleta',
            'homReconocimiento.rec_nombre',
            'homTemporada.temporadacompleta',
            [
                'attribute' => 'hom_fecha',
                'value' => $model->hom_fecha,
                'format' => ['date', 'php: d-m-Y'],
            ],
            'hom_notas',
            [
                'attribute' => 'hom_create_at',
                'value' => $model->hom_create_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
            [
                'attribute' => 'hom_update_at',
                'value' => $model->hom_update_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
        ],
    ]) ?>

    <p>
        <br>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </p>

</div>
