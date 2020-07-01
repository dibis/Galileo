<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jornada */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'New').' '.Yii::t('app', 'Matchday');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Matchday'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'New').' '.Yii::t('app', 'Matchday');
?>
<div class="jornada-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
