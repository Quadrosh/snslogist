<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LandingListitem */

$this->title = 'Create Landing Listitem';
$this->params['breadcrumbs'][] = ['label' => 'Landing Listitems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landing-listitem-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
