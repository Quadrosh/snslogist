<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TestPage */

$this->title = 'Create Test Page';
$this->params['breadcrumbs'][] = ['label' => 'Test Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-page-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
