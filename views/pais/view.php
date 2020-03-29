<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pais */

$this->title = Yii::$app->name . ' - ' . $model->pai_nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Country'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->pai_nombre;
\yii\web\YiiAsset::register($this);
?>
<div class="pais-view">

    <h3><?= Html::encode($model->pai_nombre) ?></h3><br>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->pai_id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->pai_id], [
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
            //'pai_id',
            'pai_nombre',
            [
                'attribute' => 'pai_bandera',
                'value' => function ($model) {
                    if (!empty($model->pai_bandera)) {
                        return $model->pai_bandera;
                    } else {
                        return "uploads/country/nodefinido.jpg";
                    }
                },
                'format' => ['image', ['height' => '25']],
            ],
            [
                'attribute' => 'pai_create_at',
                'value' => $model->pai_create_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
            [
                'attribute' => 'pai_update_at',
                'value' => $model->pai_update_at,
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
