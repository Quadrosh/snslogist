<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TestTarget */

$this->title = 'Create Test Target';
$this->params['breadcrumbs'][] = ['label' => 'Test Targets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-target-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
