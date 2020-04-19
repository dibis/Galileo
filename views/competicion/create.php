<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Competicion */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'New').' '.Yii::t('app', 'Competition');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Competition'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'New').' '.Yii::t('app', 'Competition');
?>
<div class="competicion-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
