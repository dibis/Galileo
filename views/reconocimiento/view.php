<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Reconocimiento */

$this->title = Yii::$app->name . ' - ' . $model->rec_nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Acknowledgment'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->rec_nombre;
\yii\web\YiiAsset::register($this);
?>
<div class="reconocimiento-view">

    <h3><?= Html::encode($model->rec_nombre) ?></h3><br>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->rec_id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->rec_id], [
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
            'rec_nombre',
            'rec_abreviatura',
            [
                'attribute' => 'rec_imagen',
                'value' => function ($model) {
                    if (!empty($model->rec_imagen)) {
                        return $model->rec_imagen;
                    } else {
                        return "uploads/reconocimiento/nodefinido.jpg";
                    }
                },
                'format' => ['image', ['height' => '25']],
            ],
            'rec_notas',
            [
                'attribute' => 'rec_create_at',
                'value' => $model->rec_create_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
            [
                'attribute' => 'rec_update_at',
                'value' => $model->rec_update_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
        ],
    ]) ?>

    <p>
        <br>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </p>
    
</div>
