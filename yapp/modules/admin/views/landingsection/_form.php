<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LandingSection */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="landing-section-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'page_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\LandingPage::find()->all(), 'id','name'),[ 'options'=>[Yii::$app->request->get('page_id')=>["Selected"=>true]]]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'order_num')->textInput() ?>
        </div>
        <div class="col-sm-12">
            <?= $form->field($model, 'head')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'lead')->textarea(['rows' => 1]) ?>

            <?= $form->field($model, 'text')->textarea(['rows' => 1]) ?>

            <?= $form->field($model, 'extra')->textarea(['rows' => 1]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'stylekey')->dropDownList([
                'dark' => 'Dark',
                'bright'=>'Bright',
                'grey'=>'Grey',
            ]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'image_alt')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'call2action_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'section_type')->dropDownList([
                'top' => 'Морда',
                'action_permanent'=>'Акция постоянная ("Extra" дней до конца)',
                'services'=>'Услуги',
                'why_we'=>'Почему мы',
                'how_we_work'=>'Как мы работаем',
                'numbers'=>'Цифры',
                'progects'=>'Проекты',
                'reviews'=>'Отзывы',
                'clients'=>'Клиенты',
                'order_form'=>'Форма заказа',
                'call2action'=>'call2action',
            ]); ?>
        </div>

    </div>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
