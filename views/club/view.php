<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Club */

$this->title = $model->clu_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clubs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="club-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->clu_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->clu_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'clu_id',
            'clu_nombre',
            'clu_nomcorto',
            'clu_propio',
            'clu_codigofex',
            'clu_escudo',
            'clu_ciudad',
            'clu_direccion',
            'clu_anofundacion',
            'clu_desaparecido',
            'clu_anodesaparicion',
            'clu_datos:ntext',
            'clu_equipacion',
            'clu_imageequipac',
            'clu_create_at',
            'clu_update_at',
        ],
    ]) ?>

</div>
