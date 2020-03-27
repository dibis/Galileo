<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pais */

$this->title = Yii::t('app', 'New');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Country'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pais-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
