<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Clasificacionalt */

$this->title = Yii::t('app', 'Create Clasificacionalt');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clasificacionalts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clasificacionalt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
