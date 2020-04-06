<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Homenaje */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'Update').' '. $model->rec_nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Acknowledgment'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rec_nombre, 'url' => ['view', 'id' => $model->rec_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="homenaje-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
