<?php

namespace app\controllers;

use app\models\Feedback;
use app\models\Preorders;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
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
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
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
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }



    public function actionFeedback()
    {
//            $data = Yii::$app->request->post('Feedback');
        $feedback = new Feedback();
//            $feedback->name = $data['name'];
//            $feedback->city = '';
//            $feedback->phone = $data['phone'];
//            $feedback->from_page = $data['from_page'];
//            $feedback->user_id = '';
//            $feedback->email = 'no-email@that.form';
//            $feedback->contacts = '';
//            $feedback->text =  '';
//            $feedback->date = '';
//            $feedback->done = '';
        if ($feedback->load(Yii::$app->request->post()) && $feedback->save()) {
//        if ($feedback->save()) {
            if ($feedback->sendEmail('SNSLOGIST.RU: Запрос обратного звонка')) {
                Yii::$app->session->setFlash('success', 'Ваша заявка отправлена. <br> Мы свяжемся с Вами в ближайшее время.');
                return $this->redirect(Url::previous());
            } else {
                Yii::$app->session->setFlash('error', 'Во время отправки произошла ошибка, попробуйте еще раз.');
                return $this->redirect(Url::previous());
            }
        } else {
            Yii::$app->session->setFlash('error', 'Во время отправки произошла ошибка, попробуйте еще раз. Или отправьте заявку в свободной форме на sns_tula@mail.ru');
            return $this->redirect(Url::previous());
        }

    }



    public function actionOrder()
    {
    //        $data = Yii::$app->request->post('Preorders');
        $preorder = new Preorders();
    //        $preorder->dispatch = $data['dispatch']; //откуда
    //        $preorder->destination = $data['destination']; // куда
    //        $preorder->phone = $data['phone']; // телефон
    //        $preorder->email = $data['email']; // email
    //        $preorder->cargo = $data['cargo']; // характер груза
    //        $preorder->weight = $data['weight']; // вес
    //        $preorder->text = $data['text']; // комментарий
    //        $preorder->from_page = $data['from_page'];
    //        $preorder->date = '';
    //        $preorder->done = '';

    //        $preorder->utm_source = $data['utm_source'];
    //        $preorder->utm_medium = $data['utm_medium'];
    //        $preorder->utm_campaign = $data['utm_campaign'];
    //        $preorder->utm_term = $data['utm_term'];
    //        $preorder->utm_content = $data['utm_content'];

    //        if ($preorder->save()) {
        if ($preorder->load(Yii::$app->request->post()) && $preorder->save()) {
            if ($preorder->sendEmail( 'SNSLOGIST.RU: Заявка на грузоперевозку')) {
                Yii::$app->session->setFlash('success', 'Ваша заявка отправлена. <br> Мы свяжемся с Вами в ближайшее время.');
                return $this->redirect(Url::previous());
            } else {
                Yii::$app->session->setFlash('error', 'Во время отправки произошла ошибка, попробуйте еще раз.');
                return $this->redirect(Url::previous());
            }
        } else {

            Yii::$app->session->setFlash('error', 'Во время отправки произошла ошибка, попробуйте еще раз. Или отправьте заявку в свободной форме на sns_tula@mail.ru');
            return $this->redirect(Url::previous());
        }

    }

    public function actionOrdercaptcha()
    {
        $data = Yii::$app->request->post('PreordersCaptcha');
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
            if ($preorder->sendEmail( 'SNSLOGIST.RU: Заявка на грузоперевозку')) {
                Yii::$app->session->setFlash('success', 'Ваша заявка отправлена. <br> Мы свяжемся с Вами в ближайшее время.');
                return $this->redirect(Url::previous());
            } else {
                Yii::$app->session->setFlash('error', 'Во время отправки произошла ошибка, попробуйте еще раз.');
                return $this->redirect(Url::previous());
            }
        } else {

            Yii::$app->session->setFlash('error', 'Во время отправки произошла ошибка, попробуйте еще раз. Или отправьте заявку в свободной форме на sns_tula@mail.ru');
            return $this->redirect(Url::previous());
        }

    }


}
