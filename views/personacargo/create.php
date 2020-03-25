<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Personacargo */

$this->title = Yii::t('app', 'Create Personacargo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Personacargos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personacargo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
