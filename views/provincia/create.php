<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Provincia */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'New').' '.Yii::t('app', 'Province');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Province'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'New').' '.Yii::t('app', 'Province');
?>
<div class="provincia-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
