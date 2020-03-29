<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Provincia */

$this->title = Yii::$app->name . ' - ' . $model->pro_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Province'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->pro_nombre;
\yii\web\YiiAsset::register($this);
?>
<div class="provincia-view">

    <h3><?= Html::encode($model->pro_nombre) ?></h3><br>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->pro_id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->pro_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            'pro_nombre',
            'proRegion.reg_nombre',
            [
                'attribute' => 'pro_create_at',
                'value' => $model->pro_create_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
            [
                'attribute' => 'pro_update_at',
                'value' => $model->pro_update_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
        ],
    ]) ?>

    <p>
        <br>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </p>
    
</div>
