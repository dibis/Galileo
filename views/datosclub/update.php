<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Datosclub */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'Update').' '. $model->datClub->clu_nomcorto;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Club dates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->datClub->clu_nomcorto, 'url' => ['view', 'id' => $model->dat_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="datosclub-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
