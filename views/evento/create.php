<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Evento */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'New').' '.Yii::t('app', 'Event');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Event'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'New').' '.Yii::t('app', 'Event');
?>
<div class="evento-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
