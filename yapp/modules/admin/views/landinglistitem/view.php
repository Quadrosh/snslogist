<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\LandingListitem */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Landing Listitems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landing-listitem-view">

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
            'section_id',
            'order_num',
            'head',
            'discr',
            'text:ntext',
            'extra:ntext',
            'image:ntext',
            'image_alt',
        ],
    ]) ?>

</div>
<div class="col-xs-6 col-sm-3">
    <h4>Image Upload</h4>
    <?php $form = ActiveForm::begin([
        'method' => 'post',
        'action' => ['/admin/landinglistitem/upload'],
        'options' => ['enctype' => 'multipart/form-data'],
    ]); ?>
    <?= $form->field($uploadmodel, 'toModelProperty')->dropDownList([
        'image'=>' Image',
//        'imagelink'=>'Imagelink',
//        'imagelink2'=>'Imagelink 2',
    ])->label(false) ?>
    <?= $form->field($uploadmodel, 'imageFile')->fileInput()->label(false) ?>
    <?= $form->field($uploadmodel, 'toModelId')->hiddenInput(['value'=>$model->id])->label(false) ?>


    <?= Html::submitButton('Upload', ['class' => 'btn btn-danger']) ?>
    <?php ActiveForm::end() ?>
</div>