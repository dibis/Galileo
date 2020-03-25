<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Reconocimiento */

$this->title = Yii::t('app', 'Create Reconocimiento');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reconocimientos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reconocimiento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
