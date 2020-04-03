<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Division */

$this->title = Yii::$app->name . ' - ' . $model->div_nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Division'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->div_nombre;
\yii\web\YiiAsset::register($this);
?>
<div class="division-view">

    <h3><?= Html::encode($model->div_nombre) ?></h3><br>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->div_id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->div_id], [
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
            'div_nombre',
            'divLicencia.lic_nombre',
            'div_rango',
            'div_notas',
            [
                'attribute' => 'div_create_at',
                'value' => $model->div_create_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
            [
                'attribute' => 'div_update_at',
                'value' => $model->div_update_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
        ],
    ]) ?>

    <p>
        <br>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </p>

</div>
