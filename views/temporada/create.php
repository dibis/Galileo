<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Temporada */

$this->title = Yii::t('app', 'Create Temporada');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Temporadas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="temporada-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
