<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Preorders */

$this->title = 'Update Preorders: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Preorders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="preorders-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
