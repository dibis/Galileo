<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Categoriaarticulo */

$this->title = Yii::t('app', 'Create Categoriaarticulo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categoriaarticulos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoriaarticulo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
