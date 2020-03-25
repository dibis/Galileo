<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Competicion */

$this->title = Yii::t('app', 'Create Competicion');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Competicions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="competicion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
