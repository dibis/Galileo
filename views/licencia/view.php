<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Licencia */

$this->title = Yii::$app->name . ' - ' . $model->lic_nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'License'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->lic_nombre;
\yii\web\YiiAsset::register($this);
?>
<div class="licencia-view">

    <h3><?= Html::encode($model->lic_nombre) ?></h3><br>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->li_id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->li_id], [
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
            'lic_nombre',
            'lic_letra',
            'lic_rango',
            'lic_notas',
            [
                'attribute' => 'lic_create_at',
                'value' => $model->lic_create_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
            [
                'attribute' => 'lic_update_at',
                'value' => $model->lic_update_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
        ],
    ]) ?>
    
    <p>
        <br>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </p>

</div>
