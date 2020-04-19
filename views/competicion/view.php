<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Competicion */

$this->title = Yii::$app->name . ' - ' . 
        $model->comTipocompeticion->tip_nombre.' '.$model->comDivision->div_nombre.' '.
        $model->comLicencia->lic_nombre.' / '.$model->comTemporada->temporadacompleta;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Competition'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->comTipocompeticion->tip_nombre.' '.$model->comDivision->div_nombre.' '.
        $model->comLicencia->lic_nombre.' / '.$model->comTemporada->temporadacompleta;
\yii\web\YiiAsset::register($this);
?>
<div class="competicion-view">

    <h3><?= Html::encode($model->comTipocompeticion->tip_nombre.' '.$model->comDivision->div_nombre.' '.
        $model->comLicencia->lic_nombre.' / '.$model->comTemporada->temporadacompleta) ?></h3><br>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->com_id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->com_id], [
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
            
            'comTipocompeticion.tip_nombre',
            [
                'attribute' => 'com_temporada',
                'value' => function ($model) {
                    if (!empty($model->com_temporada)) {
                        return $model->comTemporada->tem_inicio.' - '.$model->comTemporada->tem_final;
                    } else {
                        return "";
                    }
                },
            ],
            'comLicencia.lic_nombre',
            'comDivision.div_nombre',
            'com_grupo',
            'com_numeroequipos',
            [
                'attribute' => 'com_imagen',
                'value' => function ($model) {
                    if (!empty($model->com_imagen)) {
                        return $model->com_imagen;
                    } else {
                        return "uploads/competicion/nodefinido.jpg";
                    }
                },
                'format' => ['image', ['height' => '25']],
            ],
            'com_notas',
            [
                'attribute' => 'com_create_at',
                'value' => $model->com_create_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
            [
                'attribute' => 'com_update_at',
                'value' => $model->com_update_at,
                'format' => ['date', 'php: d-m-Y'],
            ],
        ],
    ]) ?>

    <p>
        <br>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </p>

</div>
