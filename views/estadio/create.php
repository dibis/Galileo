<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Estadio */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'New').' '.Yii::t('app', 'Stadium');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stadium'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'New').' '.Yii::t('app', 'Stadium');
?>
<div class="estadio-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
