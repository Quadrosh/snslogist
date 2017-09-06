<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LandingPage */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Landing Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landing-page-view">

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
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
//            'hrurl:url',
//            Html::a($model['hrurl'], ['/t/'.$model['hrurl']]),
            [
                'attribute'=>'hrurl',
                'value'=> Html::a($model['hrurl'], ['/lp/'.$model['hrurl']]),
                'format'=> 'html',
            ],
            'seo_logo:ntext',
            'title',
            'description:ntext',
            'keywords:ntext',
            'view',
            'layout',
            'color',
        ],
    ]) ?>
<h2>Секции</h2>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
<!--                <th>Page ID</th>-->
                <th>ID</th>
                <th>Order Num</th>
                <th>Section Type</th>
                <th>Head</th>
                <th>Lead</th>
                <th>Stylekey</th>

                <th class="action-column">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($sections as $section) : ?>
            <tr >
<!--                <td>--><?//= $section['page_id'] ?><!--</td>-->
                <td><?= $section['id'] ?></td>
                <td><?= $section['order_num'] ?></td>
                <td><?= $section['section_type'] ?></td>
                <td><?= $section['head'] ?></td>
                <td><?= $section['lead'] ?></td>
                <td><?= $section['stylekey'] ?></td>

                <td>
                    <a href="/admin/landingsection/view?id=<?= $section['id'] ?>" title="View" aria-label="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a>
                    <a href="/admin/landingsection/update?id=<?= $section['id'] ?>" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a>
                    <a href="/admin/landinglistitem/create?section_id=<?= $section['id'] ?>" title="Create List Item" aria-label="Create Item" data-pjax="0"  data-method="post"><span class="glyphicon glyphicon-check"></span></a>


                </td>
            </tr>
        <?php endforeach; ?>


        </tbody>
    </table>
    <?= Html::a('Создать секцию', ['/admin/landingsection/create', 'page_id' => $model->id], ['class' => 'btn btn-success']) ?>
    <h2>List Items</h2>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <!--                <th>Page ID</th>-->
            <th>ID</th>
            <th>Section ID</th>
            <th>Order Num</th>
            <th>Head</th>
            <th>Discr</th>
            <th>Text</th>
            <th>Extra</th>
            <th>Image</th>

            <th class="action-column">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($listItems as $listItem) : ?>
            <tr >
                <td><?= $listItem['id'] ?></td>
                <td><?= $listItem['section_id'] ?></td>
                <td><?= $listItem['order_num'] ?></td>
                <td><?= $listItem['head'] ?></td>
                <td><?= $listItem['discr'] ?></td>
                <td><?= nl2br($listItem['text']) ?></td>
                <td><?= $listItem['extra'] ?></td>
                <td><?= $listItem['image'] ?></td>

                <td>
                    <a href="/admin/landinglistitem/view?id=<?= $listItem['id'] ?>" title="View" aria-label="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a>
                    <a href="/admin/landinglistitem/update?id=<?= $listItem['id'] ?>" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a>



                </td>
            </tr>
        <?php endforeach; ?>


        </tbody>
    </table>
</div>
