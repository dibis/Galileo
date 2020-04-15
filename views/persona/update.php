<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'Update').' '. $model->per_nombre.' '. $model->per_apellidos;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Person'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->per_nombre.' '.
    $model->per_apellidos, 'url' => ['view', 'id' => $model->per_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="persona-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
