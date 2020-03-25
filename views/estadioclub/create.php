<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Estadioclub */

$this->title = Yii::t('app', 'Create Estadioclub');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estadioclubs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estadioclub-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
