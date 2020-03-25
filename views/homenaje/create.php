<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Homenaje */

$this->title = Yii::t('app', 'Create Homenaje');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Homenajes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="homenaje-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
