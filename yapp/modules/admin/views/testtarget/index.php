<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Test Targets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-target-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Test Target', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'testpage_id',
            'name',
//            'link',
            'achieve',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
