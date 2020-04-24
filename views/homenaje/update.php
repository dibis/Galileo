<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Homenaje */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'Update').' '. $model->homPersona->personacompleta;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tribute'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->homPersona->personacompleta, 'url' => ['view', 'id' => $model->hom_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="homenaje-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
