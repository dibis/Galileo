<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Evento */

$this->title = Yii::$app->name . ' - ' . $model->eve_nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Event'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->eve_nombre;
\yii\web\YiiAsset::register($this);
?>
<div class="evento-view">

    <h3><?= Html::encode($model->eve_nombre) ?></h3><br>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->eve_id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->eve_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])
        ?>
    </p>
    <br>
    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'eve_nombre',
            'eve_abreviatura',
            [
                'attribute' => 'eve_imagen',
                'value' => function ($model) {
                    if (!empty($model->eve_imagen)) {
                        return $model->eve_imagen;
                    } else {
                        return "uploads/evento/nodefinido.jpg";
                    }
                },
                'format' => ['image', ['height' => '25']],
            ],
            'eve_descripcion',
            [
                'attribute' => 'eve_create_at',
                'value' => $model->eve_create_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
            [
                'attribute' => 'eve_update_at',
                'value' => $model->eve_update_at,
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
