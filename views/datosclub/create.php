<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Datosclub */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'New').' '.Yii::t('app', 'Club dates');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Club dates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'New').' '.Yii::t('app', 'Club dates');
?>
<div class="datosclub-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
