<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\usuarios */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-view">

    <h1><?= Html::encode($this->title) ?></h1><br>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            'itemAssignments.item_name',
            //'status',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    if ($model->status == 10) {
                        return 'Activo';
                    } else {
                        return 'Inactivo';
                    }
                },
            ],
            //'created_at',
            [
                'attribute' => 'created_at',
                'format' => ['DateTime', 'php:d-m-Y']
            ],
        ],
    ])
    ?>
    
    <p>
        <br>
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-info']) ?>
    </p>

</div>
