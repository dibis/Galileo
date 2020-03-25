<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Equipocompeticion */

$this->title = Yii::t('app', 'Create Equipocompeticion');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Equipocompeticions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipocompeticion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
