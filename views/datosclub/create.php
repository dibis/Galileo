<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Datosclub */

$this->title = Yii::t('app', 'Create Datosclub');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Datosclubs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datosclub-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
