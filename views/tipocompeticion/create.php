<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tipocompeticion */

$this->title = Yii::t('app', 'Create Tipocompeticion');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipocompeticions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipocompeticion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
