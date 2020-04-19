<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Equipo */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'Update').' '. $model->equ_nomcorto;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Team'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->equ_nomcorto, 'url' => ['view', 'id' => $model->equ_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="equipo-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
