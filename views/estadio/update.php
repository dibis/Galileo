<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Estadio */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'Update').' '. $model->est_nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stadium'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->est_nombre, 'url' => ['view', 'id' => $model->est_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="estadio-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
