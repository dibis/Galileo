<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Competicion */

$this->title = $model->com_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Competicions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="competicion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->com_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->com_id], [
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
            'com_id',
            'com_nombre',
            'com_tipocompeticion',
            'com_temporada',
            'com_licencia',
            'com_grupo',
            'com_division',
            'com_numeroequipos',
            'com_imagen',
            'com_notas',
            'com_create_at',
            'com_update_at',
        ],
    ]) ?>

</div>
