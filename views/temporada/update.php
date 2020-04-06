<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Temporada */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'Update').' '. $model->tem_inicio.' - '.$model->tem_final;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Season'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tem_inicio.' - '.$model->tem_final,
    'url' => ['view', 'id' => $model->tem_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="temporada-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
