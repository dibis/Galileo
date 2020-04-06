<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Temporada */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'New').' '.Yii::t('app', 'Season');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Season'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'New').' '.Yii::t('app', 'Season');
?>
<div class="temporada-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
