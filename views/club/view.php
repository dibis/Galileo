<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Club */

$this->title = Yii::$app->name . ' - ' . $model->clu_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Club'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->clu_nombre;
\yii\web\YiiAsset::register($this);
?>
<div class="club-view">

    <h3><?= Html::encode($model->clu_nombre) ?></h3><br>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->clu_id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->clu_id], [
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
    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'clu_escudo',
                'value' => function ($model) {
                    if (!empty($model->clu_escudo)) {
                        return $model->clu_escudo;
                    } else {
                        return "uploads/escudo/nodefinido.jpg";
                    }
                },
                'format' => ['image', ['height' => '25']],
            ],
            'clu_nombre',
            'clu_nomcorto',
            [
                'attribute' => 'clu_propio',
                'label' => Yii::t('app', 'Own'),
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->clu_propio == 1 ?
                            '<span style="color:green">✔</i></span>' :
                            '<span style="color:red">✘</i></span>';
                },
            ],
            'cluCiudad.ciu_nombre',
            'clu_direccion',
            'clu_codigofex',
        ],
    ])
    ?>
        </div>
        
        <div class="col-md-6">
    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'clu_imageequipac',
                'value' => function ($model) {
                    if (!empty($model->clu_imageequipac)) {
                        return $model->clu_imageequipac;
                    } else {
                        return "uploads/equipacion/nodefinido.jpg";
                    }
                },
                'format' => ['image', ['height' => '25']],
            ],
            'clu_anofundacion',
            [
                'attribute' => 'clu_desaparecido',
                'label' => Yii::t('app', 'Extinct'),
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->clu_desaparecido == 1 ?
                            '<span style="color:red">Desaparecido</i></span>':
                            '<span style="color:green">Activo</i></span>';
                },
            ],
            'clu_anodesaparicion',
            [
                'attribute' => 'clu_create_at',
                'value' => $model->clu_create_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
            [
                'attribute' => 'clu_update_at',
                'value' => $model->clu_update_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
        ],
    ])
    ?>
        </div>
    </div>
    
    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'clu_datos:ntext',
        ],
    ])
    ?>

    <p>
        <br>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </p>

</div>
