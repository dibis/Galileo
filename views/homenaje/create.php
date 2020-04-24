<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Homenaje */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'New').' '.Yii::t('app', 'Tribute');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tribute'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'New').' '.Yii::t('app', 'Tribute');

?>
<div class="homenaje-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
