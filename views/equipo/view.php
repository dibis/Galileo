<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Equipo */

$this->title = Yii::$app->name . ' - ' . $model->equ_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Team'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->equ_nomcorto;
\yii\web\YiiAsset::register($this);
?>
<div class="equipo-view">

    <h3><?= Html::encode($model->equ_nomcorto) ?></h3><br>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->equ_id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->equ_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <div class="row">
        <div class="col-md-6">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'equ_nomcorto',
            'equClub.clu_nombre',
            'equLicencia.lic_nombre',
            [
                'attribute' => 'equ_propio',
                'label' => Yii::t('app', 'Own'),
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->equ_propio == 1 ?
                            '<span style="color:green">✔</i></span>' :
                            '<span style="color:red">✘</i></span>';
                },
            ],
            'equ_datos',
        ],
    ]) ?>
        </div>
        <div class="col-md-6">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'equClub.clu_escudo',
                'value' => function ($model) {
                    if (!empty($model->equClub->clu_escudo)) {
                        return $model->equClub->clu_escudo;
                    } else {
                        return "uploads/escudo/nodefinido.jpg";
                    }
                },
                'format' => ['image', ['height' => '95']],
            ],
            [
                'attribute' => 'equ_create_at',
                'value' => $model->equ_create_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
            [
                'attribute' => 'equ_update_at',
                'value' => $model->equ_update_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
        ],
    ]) ?>
        </div>
    </div>

    <p>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </p>

</div>
