<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cargo */

$this->title = Yii::$app->name . ' - ' . $model->car_nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Position'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->car_nombre;
\yii\web\YiiAsset::register($this);
?>
<div class="cargo-view">

    <h3><?= Html::encode($model->car_nombre) ?></h3><br>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->car_id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->car_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])
        ?>
    </p>
    <br>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'car_nombre',
            'car_abreviatura',
            'car_nivel',
            'carArea.are_nombre',
            'car_notas',
            [
                'attribute' => 'car_create_at',
                'value' => $model->car_create_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
            [
                'attribute' => 'car_update_at',
                'value' => $model->car_update_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
        ],
    ]) ?>
    
    <p>
        <br>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </p>

</div>
