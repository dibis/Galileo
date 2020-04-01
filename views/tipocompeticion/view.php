<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tipocompeticion */

$this->title = Yii::$app->name . ' - ' . $model->tip_nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Type of competition'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->tip_nombre;
\yii\web\YiiAsset::register($this);
?>
<div class="tipocompeticion-view">

    <h3><?= Html::encode($model->tip_nombre) ?></h3><br>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->tip_id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->tip_id], [
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
            'tip_nombre',
            'tip_rango',
            'tip_notas',
            [
                'attribute' => 'tip_create_at',
                'value' => $model->tip_create_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
            [
                'attribute' => 'tip_update_at',
                'value' => $model->tip_update_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
        ],
    ]) ?>

    <p>
        <br>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </p>

    
</div>
