<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Provincia */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'Update').' '. $model->pro_nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Province'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pro_nombre, 'url' => ['view', 'id' => $model->pro_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="provincia-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
