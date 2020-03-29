<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Region */

$this->title = Yii::$app->name . ' - ' . $model->reg_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Region'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->reg_nombre;
\yii\web\YiiAsset::register($this);
?>
<div class="region-view">

    <h3><?= Html::encode($model->reg_nombre) ?></h3><br>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->reg_id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->reg_id], [
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
            'reg_nombre',
            'regPais.pai_nombre',
            [
                'attribute' => 'reg_bandera',
                'value' => function ($model) {
                    if (!empty($model->reg_bandera)) {
                        return $model->reg_bandera;
                    } else {
                        return "uploads/flags/nodefinido.jpg";
                    }
                },
                'format' => ['image', ['height' => '25']],
            ],
            [
                'attribute' => 'reg_create_at',
                'value' => $model->reg_create_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
            [
                'attribute' => 'reg_update_at',
                'value' => $model->reg_update_at,
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
