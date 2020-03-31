<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cargo */

$this->title = Yii::$app->name.' - '.Yii::t('app', 'New').' '.Yii::t('app', 'Position');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Position'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'New').' '.Yii::t('app', 'Position');
?>
<div class="cargo-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
