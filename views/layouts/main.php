<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use lo\modules\noty\Wrapper;
use kartik\icons\FontAwesomeAsset;

raoul2000\bootswatch\BootswatchAsset::$theme = 'flatly';
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
        <?php
        if (Yii::$app->user->isGuest) {
            NavBar::begin([
                'brandLabel' => 'UC La Estrella',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
        } else {
            NavBar::begin([
                'brandLabel' => 'UC La Estrella - '.Yii::t('app', 'Administration'),
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
        }
        if (Yii::$app->user->can('superadmin')) {
            $menuItems[] = ['label' => 'Control acceso',
                        'items' => [
                            ['label' => Yii::t('app', 'Users'), 'url' => ['/usuarios/index']],
                            ['label' => Yii::t('app', 'New user'), 'url' => ['/usuarios/create']],
                            ['label' => Yii::t('app', 'Roles'), 'url' => ['/auth-item/index']],
                        ],
            ];
        } elseif(Yii::$app->user->can('admin') || Yii::$app->user->can('editor') || Yii::$app->user->can('user')) {
                        $menuItems[] = ['label' => Yii::t('app', 'Configuration'),
                        'items' => [
                            ['label' => Yii::t('app', 'Edit profile'), 'url' => ['/usuarios/update', 'id' => Yii::$app->user->identity->id]],
                        ],
            ];
        }

        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => Yii::t('app', 'Login'), 'url' => ['/site/login']];
        } else {
            $menuItems[] = [
                'label' => Yii::t('app', 'Logout').' (' . Yii::$app->user->identity->username . ') '.
                Html::img(Url::to(Yii::$app->request->BaseUrl.'/'.
                        Yii::$app->user->identity->image), 
                        ['alt' => Yii::$app->user->identity->image,
                        'style' => 'height: 25px; width: 25px', 'class'=>'img-circle']),
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post']
            ];
        }

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menuItems,
            'encodeLabels' => false,
        ]);
        NavBar::end();
    ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?=
                //Alert::widget() 
//                    Wrapper::widget([
//                        'layerClass' => 'lo\modules\noty\layers\Growl',
//                    ]);
                \lavrentiev\widgets\toastr\NotificationFlash::widget([
                    'options' => [
                        "closeButton" => true,
                        "debug" => false,
                        "newestOnTop" => false,
                        //"progressBar" => false,
                        "positionClass" => \lavrentiev\widgets\toastr\NotificationFlash::POSITION_TOP_RIGHT,
                        "preventDuplicates" => false,
                        "onclick" => null,
                        "showDuration" => "300",
                        "hideDuration" => "500",
                        "timeOut" => "2000",
                        "extendedTimeOut" => "500",
                        "showEasing" => "swing",
                        "hideEasing" => "linear",
                        "showMethod" => "fadeIn",
                        "hideMethod" => "fadeOut"
                    ]
                ])
                ?>
                <?= $content ?>
            </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
