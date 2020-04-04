<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Estadio */

$this->title = Yii::$app->name . ' - ' . $model->est_nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stadium'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->est_nombre;
\yii\web\YiiAsset::register($this);
?>
<div class="estadio-view">

    <h3><?= Html::encode($model->est_nombre) ?></h3><br>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->est_id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->est_id], [
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
            'est_nombre',
            'est_nombrecorto',
            'est_ciudad',
            'est_aforo',
            [
                'attribute' => 'est_bandera',
                'value' => function ($model) {
                    if (!empty($model->est_bandera)) {
                        return $model->est_bandera;
                    } else {
                        return "uploads/estadio/nodefinido.jpg";
                    }
                },
                'format' => ['image', ['height' => '25']],
            ],
            'est_datos',
            [
                'attribute' => 'est_create_at',
                'value' => $model->est_create_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
            [
                'attribute' => 'est_update_at',
                'value' => $model->est_update_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
        ],
    ]) ?>
    
    <p>
        <br>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </p>

</div>
