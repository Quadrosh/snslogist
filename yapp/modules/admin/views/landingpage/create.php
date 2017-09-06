<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LandingPage */

$this->title = 'Create Landing Page';
$this->params['breadcrumbs'][] = ['label' => 'Landing Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landing-page-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
