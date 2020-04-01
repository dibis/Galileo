<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Licencia */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'Update').' '. $model->lic_nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'License'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->lic_nombre, 'url' => ['view', 'id' => $model->li_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="licencia-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
