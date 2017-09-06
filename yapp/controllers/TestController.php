<?php

namespace app\controllers;

use app\models\MenuTop;
use app\models\Pages;
use app\models\Preorders;
use app\models\Test;
use app\models\TestPage;
use app\models\TestTarget;
use Yii;
use yii\base\Exception;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Feedback;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;

class TestController extends Controller
{
    public $layout = 'main';
    public $defaultAction = 'index';
    public $testPage;
    public $test;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return
            [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'view' => '@app/views/site/custom_error.php',
//                'layout'=> '@app/views/layouts/clear.php',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        Url::remember();
        $this->layout = 'home';
        $this->view->params['feedback'] = new Feedback();

        $pageName = 'about';
        $this->view->params['currentItem'] = 1;
        $this->view->params['pageName']=$pageName;

        $page = Pages::find()->where(['hrurl'=>$pageName])->one();
        if (trim(strtolower($page->seo_logo)) =='title') {
            $page->seo_logo = $page->title;
        }
        $this->view->params['meta']=$page;
        return $this->render('page',[
            'page' => $page,
        ]);
    }

    /**
     * Displays test.
     *
     */
    public function actionTest()
    {
        Url::remember();
        $testPageName = Yii::$app->request->get('testpage');
        if ($testPageName!=null) {
            $this->testPage = TestPage::find()->where(['hrurl'=>$testPageName])->one();
            $this->test = Test::find()->where(['id'=> $this->testPage['test_id']])->one();
            if(!isset($this->test['publish'])|| $this->test['publish'] != true){

                $this->view->params['feedback'] = new Feedback();
                throw new NotFoundHttpException('Страница в разработке');

            }
        }

        $oldViews = $this->testPage['sendtopage'];
        $newViews = $oldViews+1;
        $this->testPage['sendtopage']= $newViews;
        $this->testPage->save();
        $this->view->params['feedback'] = new Feedback();
        $this->view->params['preorderForm'] = new Preorders();

        if (!empty($this->testPage->layout)) {
            $this->layout = $this->testPage->layout;
        }


        if ($this->testPage == false) {
            $this->view->params['feedback'] = new Feedback();
            throw new \yii\web\NotFoundHttpException('Страница не существует');
        };
        $pageName = 'testPage-'. $this->testPage->id;
        $this->view->params['pageName']=$pageName;
        $this->view->params['currentItem'] = '1';
        $this->view->params['meta']['seo_logo'] = $this->testPage->title;
        $this->view->params['meta']['title'] = $this->testPage->title;
        $this->view->params['meta']['description'] = $this->testPage->description;
        $this->view->params['meta']['keywords'] = $this->testPage->keywords;
        $this->view->params['page']= $this->testPage;
        $feedbackForm = new Feedback();
        $preorderForm = new Preorders();

        if (!empty($this->testPage->view)) {
            return $this->render($this->testPage->view,[
                'page' => $this->testPage,
                'feedbackForm' => $feedbackForm,
                'preorderForm' => $preorderForm,
                'pageName' => $pageName,
            ]);
        }
        return $this->render('test',[
            'page' => $this->testPage,
            'feedbackForm' => $feedbackForm,
            'preorderForm' => $preorderForm,
            'pageName' => $pageName,
        ]);
    }


    /**
     * Displays test on development.
     *
     */
    public function actionDev()
    {
        Url::remember();
        $testPageName = Yii::$app->request->get('testpage');
        if ($testPageName!=null) {
            $this->testPage = TestPage::find()->where(['hrurl'=>$testPageName])->one();
            $this->test = Test::find()->where(['id'=> $this->testPage['test_id']])->one();
        }


        $this->view->params['feedback'] = new Feedback();
        $this->view->params['preorderForm'] = new Preorders();

        if (!empty($this->testPage->layout)) {
            $this->layout = $this->testPage->layout;
        }

        if ($this->testPage == false) {
            $this->view->params['feedback'] = new Feedback();
            throw new \yii\web\NotFoundHttpException('Страница не существует');
        };

        $pageName = 'testPage-'. $this->testPage->id;
        $this->view->params['pageName']=$pageName;
        $this->view->params['currentItem'] = '1';
        $this->view->params['meta']['seo_logo'] = $this->testPage->title;
        $this->view->params['meta']['title'] = $this->testPage->title;
        $this->view->params['meta']['description'] = $this->testPage->description;
        $this->view->params['meta']['keywords'] = $this->testPage->keywords;
        $this->view->params['page']= $this->testPage;

        $feedbackForm = new Feedback();
        $preorderForm = new Preorders();

        if (!empty($this->testPage->view)) {
            return $this->render($this->testPage->view,[
                'page' => $this->testPage,
                'feedbackForm' => $feedbackForm,
                'preorderForm' => $preorderForm,
                'pageName' => $pageName,
            ]);
        }
        return $this->render('test',[
            'page' => $this->testPage,
            'feedbackForm' => $feedbackForm,
            'preorderForm' => $preorderForm,
            'pageName' => $pageName,
        ]);
    }

    public function actionTarget(){
        $targetId = Yii::$app->request->get('id');
        $target = TestTarget::find()->where(['id'=> $targetId])->one();
        $testPage = TestPage::find()->where(['id'=>$target->testpage_id])->one();
        $test = Test::find()->where(['id'=>$testPage->test_id])->one();
        $this->layout = false;
        if($test->publish == true){
            $newCount = $target['achieve']+1;
            $target['achieve'] = $newCount;
            $target->save();
        }
    }



    public function actionFeedback()
    {
        $data = Yii::$app->request->post('Feedback');


        $testPageID = substr($data['from_page'], 9);
        $testPage = TestPage::find()->where(['id'=>$testPageID])->one();

        $feedback = new Feedback();
        $feedback->name = $data['name'];
        $feedback->city = '';
        $feedback->phone = $data['phone'];
        $feedback->from_page = $data['from_page'];
        $feedback->user_id = '';
        $feedback->email = 'no-email@that.form';
        $feedback->contacts = '';
        $feedback->text =  '';
        $feedback->date = '';
        $feedback->done = '';
        if ( $feedback->save()) {
            $feedback->from_page = $data['from_page'].' '.$testPage->keywords;
            if ($feedback->sendEmail( 'TSZAKAZ.RU: Запрос обратного звонка')) {
                Yii::$app->session->setFlash('success', 'Ваша заявка отправлена. <br> Мы свяжемся с Вами в ближайшее время.');
                return $this->redirect(Url::previous());
            } else {
                Yii::$app->session->setFlash('error', 'Во время отправки произошла ошибка, попробуйте еще раз.');
                return $this->redirect(Url::previous());
            }
        } else {
            Yii::$app->session->setFlash('error', 'Во время отправки произошла ошибка, попробуйте еще раз. Или отправьте заявку в свободной форме на transzakaz@gmail.com');
            return $this->redirect(Url::previous());
        }

    }


    public function actionOrder()
    {
        $data = Yii::$app->request->post('Preorders');

        $testPageID = substr($data['from_page'], 9);
        $testPage = TestPage::find()->where(['id'=>$testPageID])->one();

        $preorder = new Preorders();
        $preorder->dispatch = $data['dispatch']; //откуда
        $preorder->destination = $data['destination']; // куда
        $preorder->phone = $data['phone']; // телефон
        $preorder->email = $data['email']; // email
        $preorder->cargo = $data['cargo']; // характер груза
        $preorder->weight = $data['weight']; // вес
        $preorder->text = $data['text']; // комментарий
        $preorder->from_page = $data['from_page'];
        $preorder->date = '';
        $preorder->done = '';
        if ($preorder->save()) {
            $preorder->from_page = $data['from_page'].' '.$testPage->keywords;
            if ($preorder->sendEmail( 'TSZAKAZ.RU: Заявка на грузоперевозку')) {
                Yii::$app->session->setFlash('success', 'Ваша заявка отправлена. <br> Мы свяжемся с Вами в ближайшее время.');
                return $this->redirect(Url::previous());
            } else {
                Yii::$app->session->setFlash('error', 'Во время отправки произошла ошибка, попробуйте еще раз.');
                return $this->redirect(Url::previous());
            }
        } else {

            Yii::$app->session->setFlash('error', 'Во время отправки произошла ошибка, попробуйте еще раз. Или отправьте заявку в свободной форме на transzakaz@gmail.com');
            return $this->redirect(Url::previous());
        }

    }




}
