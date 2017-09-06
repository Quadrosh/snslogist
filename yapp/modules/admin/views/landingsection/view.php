<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use \yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LandingSection */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Landing Sections', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landing-section-view">

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
            'page_id',
            'order_num',
            'head',
            'lead:ntext',
            'text:ntext',
//            'extra:ntext',
            [
                'attribute'=>'extra',
                'label'=> $model->section_type == 'action_permanent' ? 'Дней до конца акции' : 'Extra',
            ],
            'stylekey',
            'image',
            'image_alt',
            'call2action_name',
            'section_type',
        ],
    ]) ?>

</div>
<section>
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-sm-3">
                <h4>Image Upload</h4>
                <?php $form = ActiveForm::begin([
                    'method' => 'post',
                    'action' => ['/admin/landingsection/upload'],
                    'options' => ['enctype' => 'multipart/form-data'],
                ]); ?>
                <?= $form->field($uploadmodel, 'toModelProperty')->dropDownList([
                    'image'=>'Image',
                ])->label(false) ?>
                <?= $form->field($uploadmodel, 'imageFile')->fileInput()->label(false) ?>
                <?= $form->field($uploadmodel, 'toModelId')->hiddenInput(['value'=>$model->id])->label(false) ?>
                <?= Html::submitButton('Upload', ['class' => 'btn btn-success']) ?>
                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>

</section>

<section>
    <h3>List Items</h3>
    <?= Html::a('Создать List Item', ['/admin/landinglistitem/create', 'section_id' => $model->id], ['class' => 'btn btn-success']) ?>
</section>
