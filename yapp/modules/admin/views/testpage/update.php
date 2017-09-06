<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TestPage */

$this->title = 'Update Test Page: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Test Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="test-page-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
