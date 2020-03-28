<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pais */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'Update').' '. $model->pai_nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Country'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pai_nombre, 'url' => ['view', 'id' => $model->pai_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="pais-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
