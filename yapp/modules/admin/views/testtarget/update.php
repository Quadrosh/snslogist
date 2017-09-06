<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TestTarget */

$this->title = 'Update Test Target: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Test Targets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="test-target-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
