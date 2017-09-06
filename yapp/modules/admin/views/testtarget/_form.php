<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TestTarget */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="test-target-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'testpage_id')->textInput() ?>
    <?= $form->field($model, 'testpage_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\TestPage::find()->all(), 'id','id'),[ 'options'=>[Yii::$app->request->get('testpage_id')=>["Selected"=>true]]]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->hiddenInput(['value'=>''])->label(false) ?>

    <?= $form->field($model, 'achieve')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
