<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Area */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'New').' '.Yii::t('app', 'Area');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Area'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'New').' '.Yii::t('app', 'Area');
?>
<div class="area-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
