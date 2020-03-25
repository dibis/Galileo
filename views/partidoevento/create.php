<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Partidoevento */

$this->title = Yii::t('app', 'Create Partidoevento');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Partidoeventos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partidoevento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
