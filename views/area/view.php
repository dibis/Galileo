<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Area */

$this->title = Yii::$app->name . ' - ' . $model->are_nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Area'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->are_nombre;
\yii\web\YiiAsset::register($this);
?>
<div class="area-view">

    <h3><?= Html::encode($model->are_nombre) ?></h3><br>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->are_id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->are_id], [
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
            'are_nombre',
            'are_abreviatura',
            'are_nivel',
            [
                'attribute' => 'are_imagen',
                'value' => function ($model) {
                    if (!empty($model->are_imagen)) {
                        return $model->are_imagen;
                    } else {
                        return "uploads/area/nodefinido.jpg";
                    }
                },
                'format' => ['image', ['height' => '25']],
            ],
            'are_notas',
            [
                'attribute' => 'are_create_at',
                'value' => $model->are_create_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
            [
                'attribute' => 'are_update_at',
                'value' => $model->are_update_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
        ],
    ]) ?>
    
    <p>
        <br>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </p>

</div>
