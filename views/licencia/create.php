<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Licencia */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'New').' '.Yii::t('app', 'License');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'License'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'New').' '.Yii::t('app', 'License');
?>
<div class="licencia-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
