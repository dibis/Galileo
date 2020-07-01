<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Jornada */

$this->title = Yii::$app->name . ' - ' . $model->jor_nombrenum;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Matchday'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->jor_nombrenum;
\yii\web\YiiAsset::register($this);
?>
<div class="jornada-view">

    <h3><?= Html::encode(Yii::t('app', 'Matchday ').$model->jor_nombrenum." / ".$model->jorCompeticion->competicioncompleta) ?></h3><br>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->jor_id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->jor_id], [
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
            'jor_nombrenum',
            [
                'attribute' => 'jor_fecha',
                'value' => $model->jor_fecha,
                'format' => ['date', 'php: d-m-Y'],
            ],
            'jorCompeticion.competicioncompleta',
            [
                'attribute' => 'jor_create_at',
                'value' => $model->jor_create_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
            [
                'attribute' => 'jor_update_at',
                'value' => $model->jor_update_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
        ],
    ]) ?>

    <p>
        <br>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </p>

</div>

