<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */

$this->title = Yii::$app->name . ' - ' . $model->per_nombre. ' '.$model->per_apellidos;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Person'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->per_nombre. ' '.$model->per_apellidos;
\yii\web\YiiAsset::register($this);
?>
<div class="persona-view">

    <h3><?= Html::encode($model->per_nombre. ' '.$model->per_apellidos) ?></h3><br>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->per_id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->per_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])
        ?>
    </p>
    <br>
    
    <div class="row">
        <div class="col-md-6">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'per_imagengeneral',
                'value' => function ($model) {
                    if (!empty($model->per_imagengeneral)) {
                        return $model->per_imagengeneral;
                    } else {
                        return "uploads/persona/nodefinido.jpg";
                    }
                },
                'format' => ['image', ['height' => '60']],
            ],
            'per_nombre',
            'per_apellidos',
            [
                'attribute' => 'per_genero',
                'label' => Yii::t('app', 'Genre'),
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->per_genero == 0 ?
                            '<span style="color:blue">Hombre</i></span>':
                            '<span style="color:fuchsia">Mujer</i></span>';
                },
            ],
            'per_apodo',
            'perLocalidad.ciu_nombre',
        ],
    ]) ?>
        </div>
        <div class="col-md-6">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'per_fechanacim',
                'value' => $model->per_fechanacim,
                'format' => ['date', 'php: d-m-Y'],
            ],
            [
                'attribute' => 'per_fallecido',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->per_fallecido == 0 ?
                            '<span style="color:fuchsia">♥</i></span>' :
                            '<span style="color:black">†</i></span>';
                },
            ],
            'per_notas',
            [
                'attribute' => 'per_create_at',
                'value' => $model->per_create_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
            [
                'attribute' => 'per_update_at',
                'value' => $model->per_update_at,
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
