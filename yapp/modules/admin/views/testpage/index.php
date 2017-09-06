<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Test Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-page-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Test Page', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'test_id',
            [
                'attribute'=> 'Test name',
                'value' => function($data)
                {
                    $theData =  \app\models\Test::find()->where(['id'=>$data['test_id']])->one();
                    return $theData['name'];
                },
            ],
//            'hrurl:url',
            'title',
            'description:ntext',
            // 'keywords:ntext',
            // 'pagehead',
            // 'pagedescription:ntext',
            // 'text:ntext',
            // 'imagelink',
            // 'imagelink_alt',
            // 'sendtopage',
            // 'promolink',
            // 'promoname',
            // 'layout',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
