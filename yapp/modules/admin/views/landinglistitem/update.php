<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LandingListitem */

$this->title = 'Update Landing Listitem: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Landing Listitems', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="landing-listitem-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
