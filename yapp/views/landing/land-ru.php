<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
//use \yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
//$this->title = 'Page View';
//$this->params['breadcrumbs'][] = $this->title;

$feedback = new \app\models\Feedback();
$preorder = new \app\models\Preorders();
?>


<nav id="w10" class="navbar-inverse  navbar" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/"><img src="/img/sns_logist_logo.png" alt="СНС - автомобильные перевозки по России"/></a>
            <a class="navbar-brand-text" href="/">Транспортная <br>логистика</a>

        </div>
        <div  class="navbar-collapse">
            <ul id="w11" class="navbar-nav navbar-right nav">
                <li><svg version="1.1"
                         class="phone_icon"
                         xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink"
                         x="0px" y="0px"
                         viewBox="0 0 16.2 14.6"
                         style="enable-background:new 0 0 16.2 14.6;"
                         xml:space="preserve">
                        <style type="text/css">
                            .phone_icon_st0{fill:#FFFFFF;}
                        </style>
                        <g >
                            <path  class="phone_icon_st0" d="M13.7,12.5c0,0-0.9,0.9-2.2,1.1c0,0-2.7-1.6-3.4-2c-0.7-0.4-2.9-2.4-4.2-4.3S1.9,4,1.9,4
		S1.8,2.7,2.9,1.7l2.4,3.5c0,0-0.4,0.7,0,1.2c0.4,0.5,3.9,3.9,3.9,3.9s0.5,0.2,1-0.1L13.7,12.5z"/>
                            <path  class="phone_icon_st0" d="M6,4.6L5.6,4.9L3.2,1.5l0.5-0.3C3.8,1,4,1.1,4.1,1.2l2,2.9C6.2,4.3,6.2,4.5,6,4.6z"/>
                            <path  class="phone_icon_st0" d="M14.2,11.7l-0.3,0.5l-3.6-2.3l0.3-0.5c0.1-0.2,0.3-0.2,0.5-0.1l3,1.9
		C14.2,11.3,14.3,11.5,14.2,11.7z"/>
                        </g>
                        </svg><span class="phone_num">(988) 777-77-77</span></li>
                <li><a  id="navbarOrderBtn" class="btn btn-default">Заказать</a></li>

            </ul>
        </div>
    </div>
</nav>
<div class="container">
<!--   dark top-->
    <section class="<?= $sections['top']['stylekey'] ?> <?= $sections['top']['section_type'] ?>" style=" background-image: url(/img/<?= $sections['top']['image'] ?>)">
        <h1 class="lead"><?= $sections['top']['lead'] ?></h1>
        <h2 class="text"><?= $sections['top']['text'] ?></h2>
        <div class="col-sm-6 col-sm-offset-3 ">
            <?= \app\widgets\Alert::widget() ?>
        </div>




        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <?php $form = ActiveForm::begin([
                    'action' =>['/site/feedback'],
                    'id' => 'quickorder-form-top',
                    'method' => 'post',]); ?>
                <div class="row">
                    <?= Html::errorSummary($feedback, ['class' => 'errors']) ?>
                    <?= $form->field($feedback, 'name')
                        ->hiddenInput(['value'=>'Noname from top form', 'id' => 'quickorder-form-top-name'])
                        ->label(false) ?>

                    <?= $form->field($feedback, 'utm_source')
                        ->hiddenInput(['value'=>$utm['source'], 'id' => 'quickorder_form_top-utm_source'])
                        ->label(false) ?>
                    <?= $form->field($feedback, 'utm_medium')
                        ->hiddenInput(['value'=>$utm['medium'], 'id' => 'quickorder_form_top-utm_medium'])
                        ->label(false) ?>
                    <?= $form->field($feedback, 'utm_campaign')
                        ->hiddenInput(['value'=>$utm['campaign'], 'id' => 'quickorder_form_top-utm_campaign'])
                        ->label(false) ?>
                    <?= $form->field($feedback, 'utm_term')
                        ->hiddenInput(['value'=>$utm['term'], 'id' => 'quickorder_form_top-utm_term'])
                        ->label(false) ?>
                    <?= $form->field($feedback, 'utm_content')
                        ->hiddenInput(['value'=>$utm['content'], 'id' => 'quickorder_form_top-utm_content'])
                        ->label(false) ?>

                    <?= $form->field($feedback, 'from_page')
                        ->hiddenInput(['value'=>'LP Перевозки по России','id' => 'quickorder-form-top-from_page'])
                        ->label(false) ?>
                    <div class="col-sm-12">
                        <?= $form->field($feedback, 'phone', [
                                    'inputOptions' => [
                                        'placeholder' => 'НОМЕР ТЕЛЕФОНА'
                                    ]])
                            ->textInput(['maxlength' => true, 'id' => 'quickorder-form-top-phone'])
                            ->label(false) ?>
                    </div>

                    <div class="col-sm-12  text-center">
                        <?= Html::submitButton('заказать обратный звонок', ['class' => 'btn btn-danger']) ?>
                    </div>
                </div>
                <?php $form = ActiveForm::end(); ?>
            </div>
        </div>

    </section>
    <!--    Виды услуг  -->
    <section class="<?= $sections['services']['stylekey'] ?> <?= $sections['services']['section_type'] ?>">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="head"><?= $sections['services']['head'] ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 text-center">
                <div class="service_type_icon">
                    <?= $sections['servicesListItems'][0]['image'] ?>
                </div>
                <div class="service_type__head">
                    <?= $sections['servicesListItems'][0]['head'] ?>
                </div>
                <div class="service_type__discr">
                    <?= $sections['servicesListItems'][0]['discr'] ?>
                </div>
                <div class="service_type__text">
                    <?= $sections['servicesListItems'][0]['text'] ?>
                </div>

            </div>
            <div class="col-sm-4 text-center">
                <div class="service_type_icon">
                    <?= $sections['servicesListItems'][1]['image'] ?>
                </div>
                <div class="service_type__head">
                    <?= $sections['servicesListItems'][1]['head'] ?>
                </div>
                <div class="service_type__discr">
                    <?= $sections['servicesListItems'][1]['discr'] ?>
                </div>
                <div class="service_type__text">
                    <?= $sections['servicesListItems'][1]['text'] ?>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="service_type_icon">
                    <?= $sections['servicesListItems'][2]['image'] ?>
                </div>
                <div class="service_type__head">
                    <?= $sections['servicesListItems'][2]['head'] ?>
                </div>
                <div class="service_type__discr">
                    <?= $sections['servicesListItems'][2]['discr'] ?>
                </div>
                <div class="service_type__text">
                    <?= $sections['servicesListItems'][2]['text'] ?>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <?php $form = ActiveForm::begin([
                    'action' =>['/site/feedback'],
                    'id' => 'services-form',
                    'method' => 'post',]); ?>
                <div class="row">
                    <?= Html::errorSummary($feedback, ['class' => 'errors']) ?>
                    <?= $form->field($feedback, 'from_page')
                        ->hiddenInput(['value'=>'LP Перевозки по России','id' => 'services_form-from_page'])
                        ->label(false) ?>

                    <?= $form->field($feedback, 'utm_source')
                        ->hiddenInput(['value'=>$utm['source'], 'id' => 'services_form-utm_source'])
                        ->label(false) ?>
                    <?= $form->field($feedback, 'utm_medium')
                        ->hiddenInput(['value'=>$utm['medium'], 'id' => 'services_form-utm_medium'])
                        ->label(false) ?>
                    <?= $form->field($feedback, 'utm_campaign')
                        ->hiddenInput(['value'=>$utm['campaign'], 'id' => 'services_form-utm_campaign'])
                        ->label(false) ?>
                    <?= $form->field($feedback, 'utm_term')
                        ->hiddenInput(['value'=>$utm['term'], 'id' => 'services_form-utm_term'])
                        ->label(false) ?>
                    <?= $form->field($feedback, 'utm_content')
                        ->hiddenInput(['value'=>$utm['content'], 'id' => 'services_form-utm_content'])
                        ->label(false) ?>

                    <div class="col-sm-12">
                        <div class="styled_select">
                            <?= $form->field($feedback, 'name')->dropDownList([
                                'консультация - отдельной машиной'=>'ОТДЕЛЬНАЯ МАШИНА',
                                'консультация - догруз'=>'ДОГРУЗ',
                                'консультация - страхование груза'=>'СТРАХОВАНИЕ ГРУЗА'
                            ],  ['options' =>
                                [
                                    'консультация - отдельной машиной' => ['selected' => true]
                                ]
                            ])->label(false) ?>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class=" styled_input">
                            <?= $form->field($feedback, 'phone', [
                                'inputOptions' => [
                                    'placeholder' => 'ТЕЛЕФОН'
                                ]])->textInput(['maxlength' => true, 'id' => 'services-form-phone'])->label(false) ?>
                        </div>
                    </div>


                    <div class="col-sm-12  text-center">
                        <?= Html::submitButton('получить консультацию', ['class' => 'btn btn-danger']) ?>
                    </div>
                </div>
                <?php $form = ActiveForm::end(); ?>
            </div>
        </div>


    </section>

<!--    акция -->
    <section class="<?= $sections['action']['stylekey'] ?> <?= $sections['action']['section_type'] ?>" style=" background-image: url(/img/<?= $sections['action']['image'] ?>)">

        <div class="row">
            <div class="col-sm-6 ">
                <div class="left">
                    <div class="square_box">
                        <div class="row">
                            <div class="col-xs-6 text-left">
                                <h2 class="spurt"><?= $sections['action']['head'] ?></h2>
                            </div>
                            <div class="col-xs-6 text-right">
                                <h4 class="tillTo">до <?php
                                    $now = new \DateTime();
                                    $modstr = '+'.$sections['action']['extra'].' day';
                                    $actionEnd = $now->modify($modstr);
                                    $date=$actionEnd->format('d.m.Y');
                                    echo $date;
                                    ?></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <h2 class="lead"><?= $sections['action']['lead'] ?></h2>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-6 ">
                <div class="right">
                    <div class="square_box timer_box">
                        <div id="dateObj" data-days="<?= $sections['action']['extra'] ?>" class="col-sm-10 col-sm-offset-1 text-center">
                            <h4 class="remainHead">до конца акции осталось:</h4>

                            <div class="col-xs-3"><span class="remainNumber" id="RemainsDays"></span><span class="remainDiscr">дней</span></div>
                            <div class="col-xs-3"><span class="remainNumber" id="RemainsHours"></span><span class="remainDiscr">часов</span></div>
                            <div class="col-xs-3"><span class="remainNumber" id="RemainsMinutes"></span><span class="remainDiscr">минут</span></div>
                            <div class="col-xs-3"><span class="remainNumber" id="RemainsSeconds"></span><span class="remainDiscr">секунд</span></div>




                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="left">
                    <div class="square_box">
                        <div class="col-sm-12">
                            <p class="comment">*<?= $sections['action']['text'] ?></p>
                        </div>

                    </div>
                </div>



            </div>
            <div class="col-sm-6 text-center">
                <div class="right">
                    <div class="square_box_transparent">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="actionOrderButton">
                                <a  id="actionOrderButton"
                                    data-action="<?= $sections['action']['lead'] ?>"
                                    data-action-comment="<?= $sections['action']['text'] ?>"
                                    class="btn btn-danger"><?= $sections['action']['call2action_name'] ?></a>
                            </div>
                        </div>

                    </div>
                </div>


            </div>

        </div>
    </section>



<!-- почему мы -->
    <section class="<?= $sections['whyWe']['stylekey'] ?> <?= $sections['whyWe']['section_type'] ?>">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="head"><?= $sections['whyWe']['head'] ?></h2>
            </div>
            <?php foreach ($sections['whyWeListItems'] as $listItem ) : ?>
                <div class="row">
                    <div class="col-xs-3 col-sm-offset-2 col-xs-offset-1">
                        <div class="whyWe_icon">
                            <img src="/img/<?= $listItem ['image'] ?>" alt="СНС логист - <?= $listItem ['head'] ?>">
                        </div>
                    </div>
                    <div class="col-sm-5 col-xs-6">
                        <div class="whyWe_text">
                            <?= $listItem ['head'] ?>
                        </div>
                        <div class="whyWe_comment">
                            <?= $listItem ['text'] ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <section id="numberSection" class="<?= $sections['numbers']['stylekey'] ?> <?= $sections['numbers']['section_type'] ?>"  style=" background-image: url(/img/<?= $sections['numbers']['image'] ?>)">
        <div class="row">
            <div class="col-sm-4 text-center">
                <div class="numbers_num">
                    <?= $sections['numbersListItems'][0] ['head'] ?>
                </div>
                <div class="numbers_text">
                    <?= $sections['numbersListItems'][0] ['text'] ?>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="numbers_num">
                    <?= $sections['numbersListItems'][1] ['head'] ?>
                </div>
                <div class="numbers_text">
                    <?= $sections['numbersListItems'][1] ['text'] ?>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="numbers_num">
                    <?= $sections['numbersListItems'][2] ['head'] ?>
                </div>
                <div class="numbers_text">
                    <?= nl2br($sections['numbersListItems'][2] ['text']) ?>
                </div>
            </div>
        </div>
    </section>




    <!--  проекты  -->
    <section class="<?= $sections['projects']['stylekey'] ?> <?= $sections['projects']['section_type'] ?>">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="head"><?= $sections['projects']['head'] ?></h2>
            </div>
            <div class="col-sm-12">
                <div class="doneProjects">
                    <?php foreach ($sections['projectsListItems'] as $project) : ?>
                        <div class="row">
                            <div class="col-sm-6 ">
                                <div class="project_image" style="background-image: url(/img/<?= $project['image'] ?>);background-size: cover;background-position: center center;">

                                </div>
                            </div>
                            <div class="col-sm-6 ">
                                <div class="project_head">
                                    <?= $project ['head'] ?>
                                </div>
                                <div class="project_text">
                                    <?= nl2br($project ['text']) ?>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>
                <a class="carouselControl slickPrev"><svg version="1.1"
                                                          xmlns="http://www.w3.org/2000/svg"
                                                          xmlns:xlink="http://www.w3.org/1999/xlink"
                                                          x="0px" y="0px"
                                                          viewBox="0 0 100 100"
                                                          style="enable-background:new 0 0 100 100;"
                                                          xml:space="preserve">
    <style type="text/css">
        .button_x5F_left_st0{fill:none;stroke-width:3;stroke-miterlimit:10;}
        .button_x5F_left_st1{fill:none;stroke-width:3;stroke-linecap:round;stroke-miterlimit:10;}
    </style>
                        <g >
                            <circle  class="button_x5F_left_st0" cx="49.7" cy="50" r="46.4"/>
                            <line  class="button_x5F_left_st1" x1="38.9" y1="50" x2="61.5" y2="27.5"/>
                            <line  class="button_x5F_left_st1" x1="38.9" y1="50.5" x2="61.5" y2="73"/>
                        </g>
    </svg></a>

                <a class="carouselControl slickNext" ><svg version="1.1"
                                                           xmlns="http://www.w3.org/2000/svg"
                                                           xmlns:xlink="http://www.w3.org/1999/xlink"
                                                           x="0px" y="0px"
                                                           viewBox="0 0 100 100"
                                                           style="enable-background:new 0 0 100 100;"
                                                           xml:space="preserve">
    <style type="text/css">
        .button_x5F_right_st0{fill:none;stroke-width:3;stroke-miterlimit:10;}
        .button_x5F_right_st1{fill:none;stroke-width:3;stroke-linecap:round;stroke-miterlimit:10;}
    </style>
                        <g >
                            <circle  class="button_x5F_right_st0" cx="49.7" cy="50" r="46.4"/>
                            <line  class="button_x5F_right_st1" x1="61.5" y1="50.5" x2="38.9" y2="73"/>
                            <line  class="button_x5F_right_st1" x1="61.5" y1="50" x2="38.9" y2="27.5"/>
                        </g>
    </svg></a>

            </div>
        </div>

    </section>




    <!-- how we work -->
    <section class="<?= $sections['howWeWork']['stylekey'] ?> <?= $sections['howWeWork']['section_type'] ?>" style=" background-image: url(/img/<?= $sections['howWeWork']['image'] ?>)">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="head"><?= $sections['howWeWork']['head'] ?></h2>
                <div >
                    <?= $sections['howWeWork']['extra'] ?>
                </div>

            </div>
            <div class="col-sm-3 text-center">
                <div class="howWeWork_icon">
                    <?= $sections['howWeWorkListItems'][0] ['image'] ?>
                </div>
                <div class="howWeWork_head">
                    <?= $sections['howWeWorkListItems'][0] ['head'] ?>
                </div>
                <div class="howWeWork_text">
                    <?= $sections['howWeWorkListItems'][0] ['text'] ?>
                </div>
                <div class="display_xs">
                    <svg version="1.1" class="arrowDown_ico"
                         xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 90 120"
                         style="enable-background:new 0 0 90 120;"
                         xml:space="preserve">
                        <polygon  fill="none" stroke="#1AB2C1" stroke-miterlimit="10" points="45,108.5 76.8,76.7 60.4,76.7 60.4,11.5 29.6,11.5 29.6,76.7 13.2,76.7 "/>
                    </svg>
                </div>
            </div>

            <div class="col-sm-3 text-center ellipse_margin">
                <div class="howWeWork_icon">
                    <?= $sections['howWeWorkListItems'][1] ['image'] ?>
                </div>
                <div class="howWeWork_head">
                    <?= $sections['howWeWorkListItems'][1] ['head'] ?>
                </div>
                <div class="howWeWork_text">
                    <?= $sections['howWeWorkListItems'][1] ['text'] ?>
                </div>
                <div class="display_xs">
                    <svg version="1.1" class="arrowDown_ico"
                         xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 90 120"
                         style="enable-background:new 0 0 90 120;"
                         xml:space="preserve">
                        <polygon  fill="none" stroke="#1AB2C1" stroke-miterlimit="10" points="45,108.5 76.8,76.7 60.4,76.7 60.4,11.5 29.6,11.5 29.6,76.7 13.2,76.7 "/>
                    </svg>
                </div>
            </div>

            <div class="col-sm-3 text-center ellipse_margin">
                <div class="howWeWork_icon">
                    <?= $sections['howWeWorkListItems'][2] ['image'] ?>
                </div>
                <div class="howWeWork_head">
                    <?= $sections['howWeWorkListItems'][2] ['head'] ?>
                </div>
                <div class="howWeWork_text">
                    <?= $sections['howWeWorkListItems'][2] ['text'] ?>
                </div>
                <div class="display_xs">
                    <svg version="1.1" class="arrowDown_ico"
                         xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 90 120"
                         style="enable-background:new 0 0 90 120;"
                         xml:space="preserve">
                        <polygon  fill="none" stroke="#1AB2C1" stroke-miterlimit="10" points="45,108.5 76.8,76.7 60.4,76.7 60.4,11.5 29.6,11.5 29.6,76.7 13.2,76.7 "/>
                    </svg>
                </div>
            </div>

            <div class="col-sm-3 text-center">
                <div class="howWeWork_icon">
                    <?= $sections['howWeWorkListItems'][3] ['image'] ?>
                </div>
                <div class="howWeWork_head">
                    <?= $sections['howWeWorkListItems'][3] ['head'] ?>
                </div>
                <div class="howWeWork_text">
                    <?= $sections['howWeWorkListItems'][3] ['text'] ?>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <?php $form = ActiveForm::begin([
                    'action' =>['/site/feedback'],
                    'id' => 'howWeWork_form',
                    'method' => 'post',]); ?>
                <div class="row">
                    <?= Html::errorSummary($feedback, ['class' => 'errors']) ?>
                    <?= $form->field($feedback, 'from_page')
                        ->hiddenInput(['value'=>'LP Перевозки по России','id' => 'howWeWork_form-from_page'])
                        ->label(false) ?>
                    <?= $form->field($feedback, 'name')
                        ->hiddenInput(['value'=>'Секция - Как мы работаем - Рассчитать стоимость','id' => 'howWeWork_form-name'])
                        ->label(false) ?>

                    <?= $form->field($feedback, 'utm_source')
                        ->hiddenInput(['value'=>$utm['source'], 'id' => 'howWeWork_form-utm_source'])
                        ->label(false) ?>
                    <?= $form->field($feedback, 'utm_medium')
                        ->hiddenInput(['value'=>$utm['medium'], 'id' => 'howWeWork_form-utm_medium'])
                        ->label(false) ?>
                    <?= $form->field($feedback, 'utm_campaign')
                        ->hiddenInput(['value'=>$utm['campaign'], 'id' => 'howWeWork_form-utm_campaign'])
                        ->label(false) ?>
                    <?= $form->field($feedback, 'utm_term')
                        ->hiddenInput(['value'=>$utm['term'], 'id' => 'howWeWork_form-utm_term'])
                        ->label(false) ?>
                    <?= $form->field($feedback, 'utm_content')
                        ->hiddenInput(['value'=>$utm['content'], 'id' => 'howWeWork_form-utm_content'])
                        ->label(false) ?>


                    <div class="col-sm-12 mt50">
                        <div class="styled_input text-center">
                            <?= $form->field($feedback, 'phone', [
                                'inputOptions' => [
                                    'placeholder' => 'ТЕЛЕФОН'
                                ]])->textInput(['maxlength' => true, 'id' => 'howWeWork_form-phone'])->label(false) ?>
                        </div>
                    </div>


                    <div class="col-sm-12  text-center">
                        <?= Html::submitButton('рассчитать стоимость', ['class' => 'btn btn-danger']) ?>
                    </div>
                </div>
                <?php $form = ActiveForm::end(); ?>
            </div>
        </div>

    </section>



<!--    Reviews   -->

    <section class="<?= $sections['reviews']['stylekey'] ?> <?= $sections['reviews']['section_type'] ?>" style=" background-image: url(/img/<?= $sections['reviews']['image'] ?>)">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="head"><?= $sections['reviews']['head'] ?></h2>
            </div>
        </div>

            <div class="reviewsCarWrapper ">
                <div class="reviewsCarousel">
                    <?php foreach ($sections['reviewsListItems'] as $review) : ?>
                        <div class="review_item">

                            <a class="caruMagLink" href="/img/<?= $review['image'] ?>"><img src="/img/th_<?= $review['image'] ?>" alt="<?= $review['image_alt'] ?>" /></a>

                        </div>

                    <?php endforeach; ?>

                </div>
                <a class="carouselControl slickReviewsPrev"><svg version="1.1"
                                                                 xmlns="http://www.w3.org/2000/svg"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                 x="0px" y="0px"
                                                                 viewBox="0 0 100 100"
                                                                 style="enable-background:new 0 0 100 100;"
                                                                 xml:space="preserve">
<style type="text/css">
    .Reviewsbutton_x5F_left_st0{fill:none;stroke-width:3;stroke-miterlimit:10;}
    .Reviewsbutton_x5F_left_st1{fill:none;stroke-width:3;stroke-linecap:round;stroke-miterlimit:10;}
</style>
                        <g >
                            <circle  class="Reviewsbutton_x5F_left_st0" cx="49.7" cy="50" r="46.4"/>
                            <line  class="Reviewsbutton_x5F_left_st1" x1="38.9" y1="50" x2="61.5" y2="27.5"/>
                            <line  class="Reviewsbutton_x5F_left_st1" x1="38.9" y1="50.5" x2="61.5" y2="73"/>
                        </g>
</svg></a>

                <a class="carouselControl slickReviewsNext" ><svg version="1.1"
                                                                  xmlns="http://www.w3.org/2000/svg"
                                                                  xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                  x="0px" y="0px"
                                                                  viewBox="0 0 100 100"
                                                                  style="enable-background:new 0 0 100 100;"
                                                                  xml:space="preserve">
<style type="text/css">
    .Reviewsbutton_x5F_right_st0{fill:none;stroke-width:3;stroke-miterlimit:10;}
    .Reviewsbutton_x5F_right_st1{fill:none;stroke-width:3;stroke-linecap:round;stroke-miterlimit:10;}
</style>
                        <g >
                            <circle  class="Reviewsbutton_x5F_right_st0" cx="49.7" cy="50" r="46.4"/>
                            <line  class="Reviewsbutton_x5F_right_st1" x1="61.5" y1="50.5" x2="38.9" y2="73"/>
                            <line  class="Reviewsbutton_x5F_right_st1" x1="61.5" y1="50" x2="38.9" y2="27.5"/>
                        </g>
</svg></a>






        </div>

    </section>


<!--    Main Order   -->
    <section id="mainOrderSection" class="<?= $sections['order']['stylekey'] ?> <?= $sections['order']['section_type'] ?>">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="head"><?= $sections['order']['head'] ?></h2>
                <p class="top_comment">Вы так же можете заказать отправку по телефону (988) 777-77-77</p>
            </div>

            <div class="col-lg-8 col-lg-offset-2">
                <div class="feedback-form " >
                    <?php $form = ActiveForm::begin([
                        'action' =>['site/order'],
                        'id' => 'mainOrderForm',
                        'method' => 'post',]); ?>
                    <!--    --><?php //$form = ActiveForm::begin(['action' =>['site/ordercaptcha'], 'method' => 'post',]); ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($preorderForm, 'dispatch')
                                ->textInput(['required' => true,'id' => 'mainOrderForm-dispatch'])
                                ->label('Откуда') ?>
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($preorderForm, 'destination')
                                ->textInput(['required' => true, 'id' => 'mainOrderForm-destination'])
                                ->label('Куда') ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($preorderForm, 'phone')
                                ->textInput(['required' => true, 'id' => 'mainOrderForm-phone']) ?>
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($preorderForm, 'email')
                                ->textInput(['maxlength' => true, 'id' => 'mainOrderForm-email']) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($preorderForm, 'cargo')
                                ->textInput(['required' => true, 'id' => 'mainOrderForm-cargo'])
                                ->label('Характер груза')  ?>
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($preorderForm, 'weight')
                                ->textInput(['maxlength' => true, 'id' => 'mainOrderForm-weight'])
                                ->label('Вес')  ?>
                        </div>
                        <div class="col-sm-12">
                            <?= $form->field($preorderForm, 'text')
                                ->textarea(['rows' => 1, 'id' => 'mainOrderForm-text'])
                                ->label('Комментарий') ?>
                        </div>
                        <!--        captcha -->
                        <!--        <div class="col-sm-12"> --><?//= $form->field($preorderForm, 'captcha')->widget(Captcha::className()) ?><!--</div>-->

                        <?= $form->field($preorderForm, 'from_page')
                            ->hiddenInput(['value'=>'LP Перевозки по России', 'id' => 'mainOrderForm-from_page'])
                            ->label(false) ?>

                        <?= $form->field($preorderForm, 'utm_source')
                            ->hiddenInput(['value'=>$utm['source'], 'id' => 'mainOrderForm-utm_source'])
                            ->label(false) ?>
                        <?= $form->field($preorderForm, 'utm_medium')
                            ->hiddenInput(['value'=>$utm['medium'], 'id' => 'mainOrderForm-utm_medium'])
                            ->label(false) ?>
                        <?= $form->field($preorderForm, 'utm_campaign')
                            ->hiddenInput(['value'=>$utm['campaign'], 'id' => 'mainOrderForm-utm_campaign'])
                            ->label(false) ?>
                        <?= $form->field($preorderForm, 'utm_term')
                            ->hiddenInput(['value'=>$utm['term'], 'id' => 'mainOrderForm-utm_term'])
                            ->label(false) ?>
                        <?= $form->field($preorderForm, 'utm_content')
                            ->hiddenInput(['value'=>$utm['content'], 'id' => 'mainOrderForm-utm_content'])
                            ->label(false) ?>

                        <div class="col-sm-6 col-sm-offset-3 text-center">
                            <?= Html::submitButton('отправить заявку', ['class' => 'btn btn-danger sendorder-btn']) ?>
                        </div>
                    </div>
                    <?php $form = ActiveForm::end(); ?>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2 text-center">

<!--                <p class="footer">&copy; Транспортная компания &ldquo; СНС&rdquo;, --><?//= date('Y') ?><!--</p>-->


            </div>



        </div>


    </section>
</div>








