<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Equipo */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'New').' '.Yii::t('app', 'Team');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Team'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'New').' '.Yii::t('app', 'Team');
?>
<div class="equipo-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
