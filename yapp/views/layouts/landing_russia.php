<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\ActiveForm;

//AppAsset::register($this);
app\assets\LandingRussiaAsset::register($this);


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title> <?= Yii::$app->view->params['meta']['title'] ?> </title>
    <meta name="description" content="<?= Yii::$app->view->params['meta']['description'] ?>">
    <meta name="keywords" content="<?= Yii::$app->view->params['meta']['keywords'] ?>">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,500,700&amp;subset=cyrillic" rel="stylesheet">

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="container">
    <?//= Html::errorSummary($feedback, ['class' => 'errors']) ?>

    <?= $content ?>
</div>






<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
