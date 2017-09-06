<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Landing Listitems';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landing-listitem-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Landing Listitem', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'section_id',
            'order_num',
            'head',
            'discr',
             'text:ntext',
             'extra:ntext',
             'image:ntext',
             'image_alt',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
