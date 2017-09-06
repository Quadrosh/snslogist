<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Landing Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landing-page-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Create Landing Page', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
//            'hrurl:url',
            [
                'attribute'=>'hrurl',
                'value' => function($data)
                {
                    $theData = Html::a($data['hrurl'], ['/lp/'.$data['hrurl']]);
                    return $theData;
                },
                'format'=> 'html',
            ],
            'seo_logo:ntext',
            'title',
            // 'description:ntext',
            // 'keywords:ntext',
            // 'view',
            // 'layout',
            // 'color',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
