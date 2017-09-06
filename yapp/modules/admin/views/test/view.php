<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\TestPage;

    /* @var $this yii\web\View */
/* @var $model app\models\Test */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="test-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Опубликовать', ['publish', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Снять с публикации', ['unpublish', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Сбросить показания', ['reset', 'id' => $model->id], ['class' => 'btn btn-warning','data-confirm'=>'хорошо подумал?']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description:ntext',
//            'publish',
            [
                'attribute'=>'publish',
                'value'=> $model->publish ? '<span class="text-primary">Публикуется</span>' : '<span class="text-danger">Не опубликован</span>',
                'format'=> 'html',
            ],
            'start_date',
            'end_date',
        ],
    ]) ?>
<h2>Варианты</h2>
    <table class="table  table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Layout</th>
            <th>View</th>
            <th>hrurl</th>
            <th>Примечание</th>
            <th>Просмотры</th>
            <th class="action-column">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($testPages as $testPage) : ?>
        <tr data-key="1">
            <td><?= $testPage['id'] ?></td>
            <td><?= $testPage['layout'] ?></td>
            <td><?= $testPage['view'] ?></td>
            <td> <?= $model->publish ? Html::a($testPage['hrurl'], ['/t/'.$testPage['hrurl']]) : Html::a($testPage['hrurl'], ['/dev/'.$testPage['hrurl']]) ?></td>
            <td><?= $testPage['keywords'] ?></td>
            <td><?= $testPage['sendtopage'] ?></td>

            <td>
                <a href="/admin/testpage/view?id=<?= $testPage['id'] ?>">
                    <span class="glyphicon glyphicon-eye-open"></span>
                </a>
                <a href="/admin/testpage/update?id=<?= $testPage['id'] ?>">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
                <a href="/admin/testpage/delete?id=<?= $testPage['id'] ?>" data-confirm="Уверен, что хочешь удалить?" data-method="post">
                    <span class="glyphicon glyphicon-remove"></span>
                </a>


                <a href="/admin/testpage/copy?id=<?= $testPage['id'] ?>">
                    <span class="glyphicon glyphicon-duplicate"></span>
                </a>
                <a href="/admin/testtarget/create?testpage_id=<?= $testPage['id'] ?>">
                    <span style="color: #c55;" class=" glyphicon glyphicon-screenshot"></span>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <?= Html::a('Create Test Page', ['/admin/testpage/create', 'test_id'=>$model->id], ['class' => 'btn btn-success']) ?>

<h2>Цели</h2>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th><a href="/admin/testtarget/index?sort=id" data-sort="id">ID</a></th>
            <th><a href="/admin/testtarget/index?sort=testpage_id" data-sort="testpage_id">Testpage</a></th>
            <th><a href="/admin/testtarget/index?sort=testpage_id" data-sort="testpage_id">Testpage Name</a></th>
            <th><a href="/admin/testtarget/index?sort=name" data-sort="name">Name</a></th>
            <th><a href="/admin/testtarget/index?sort=achieve" data-sort="achieve">Achieve</a></th>
            <th>Конверсия</th>
            <th class="action-column">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($testTargets as $testPageTargets) : ?>
            <?php foreach ($testPageTargets as $testTarget) : ?>
        <tr data-key="1">
            <td><?= $testTarget['id'] ?></td>
            <td><?= $testTarget['testpage_id'] ?></td>
            <td><?= TestPage::find()->where(['id'=>$testTarget['testpage_id']])->one()['hrurl']; ?></td>
            <td><?= $testTarget['name'] ?></td>
            <td><?= $testTarget['achieve'] ?></td>
            <td><?=
                TestPage::find()->where(['id'=>$testTarget['testpage_id']])->one()['sendtopage']!=0 ?
                round($testTarget['achieve'] / TestPage::find()->where(['id'=>$testTarget['testpage_id']])->one()['sendtopage'] * 100,1): 0 ?>%</td>


            <td>
                <a href="/admin/testtarget/view?id=<?= $testTarget['id'] ?>" title="View" aria-label="View" data-pjax="0">
                    <span class="glyphicon glyphicon-eye-open"></span>
                </a>


            </td>
        </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>

        </tbody>
    </table>

</div>
