<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jornada */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'Update').' '. $model->jor_nombrenum;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Matchday'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jor_nombrenum, 'url' => ['view', 'id' => $model->jor_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="jornada-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
