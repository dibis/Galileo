<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ciudad */

$this->title = Yii::$app->name . ' - ' . $model->ciu_nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'City'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->ciu_nombre;
\yii\web\YiiAsset::register($this);
?>
<div class="ciudad-view">

    <h3><?= Html::encode($model->ciu_nombre) ?></h3><br>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->ciu_id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->ciu_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ciu_nombre',
            'ciuProvincia.pro_nombre',
            'ciu_codpos',
            [
                'attribute' => 'ciu_create_at',
                'value' => $model->ciu_create_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
            [
                'attribute' => 'ciu_update_at',
                'value' => $model->ciu_update_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
        ],
    ])
    ?>

    <p>
        <br>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </p>

</div>
