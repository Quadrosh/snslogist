<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LandingListitem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="landing-listitem-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'section_id')->textInput() ?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'section_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\LandingSection::find()->all(), 'id','id'),[ 'options'=>[Yii::$app->request->get('section_id')=>["Selected"=>true]]]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'order_num')->textInput() ?>
        </div>
        <div class="col-sm-8">
            <?= $form->field($model, 'image')->textarea(['rows' => 1]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'image_alt')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-12"><?= $form->field($model, 'head')->textInput(['maxlength' => true]) ?></div>
        <div class="col-sm-12"><?= $form->field($model, 'discr')->textInput(['maxlength' => true]) ?></div>
        <div class="col-sm-6"><?= $form->field($model, 'text')->textarea(['rows' => 2]) ?></div>
        <div class="col-sm-6"><?= $form->field($model, 'extra')->textarea(['rows' => 2]) ?></div>

    </div>


















    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
