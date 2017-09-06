<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
//app\assets\MainAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'СНС логист '. Yii::$app->user->identity['username'],
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
//            ['label' => 'Gii', 'url' => ['/gii']],
            [
                'label' => 'Landing',
                'items' => [
                    ['label' => 'Landing Page', 'url' => ['/admin/landingpage']],
                    ['label' => 'Landing Section', 'url' => ['/admin/landingsection']],
                    ['label' => 'Landing List Item', 'url' => ['/admin/landinglistitem']],
                ],
            ],
            [
                'label' => 'АБ Тесты',
                'items' => [
                    ['label' => 'test', 'url' => ['/admin/test/index']],
                    ['label' => 'test page', 'url' => ['/admin/testpage/index']],
                    ['label' => 'test target', 'url' => ['/admin/testtarget/index']],
                ],
            ],
            [
                'label' => 'Заявки',
                'items' => [
                    ['label' => 'Preorders', 'url' => ['/admin/preorders/index']],
                    ['label' => 'Feedback', 'url' => ['/admin/feedback/index']],
                    ['label' => 'UTM', 'url' => ['/admin/preorders/utm']],
                ],
            ],
            ['label' => 'Pages', 'url' => ['/admin/pages']],
            ['label' => 'Images', 'url' => ['/admin/imagefiles']],
//            ['label' => 'Articles', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
            ['label' => 'Login', 'url' => ['/admin/default/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= \app\widgets\Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; СНС логист <?= date('Y') ?></p>

    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
