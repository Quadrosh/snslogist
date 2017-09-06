<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LandingSection */

$this->title = 'Create Landing Section';
$this->params['breadcrumbs'][] = ['label' => 'Landing Sections', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landing-section-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
