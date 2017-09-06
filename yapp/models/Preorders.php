<?php

namespace app\models;

use Yii;
use yii\httpclient\Client;

/**
 * This is the model class for table "preorders".
 *
 * @property int $id
 * @property string $dispatch
 * @property string $destination
 * @property string $cargo
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $weight
 * @property string $text
 * @property string $from_page
 * @property string $date
 * @property int $done
 */
class Preorders extends \yii\db\ActiveRecord
{
    public $emailForSend = 'quadrosh@gmail.com';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'preorders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dispatch', 'destination', 'cargo', 'phone'], 'required'],
            [['text'], 'string'],
            [['date'], 'safe'],
            [['done'], 'integer'],
            [['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'], 'string'],
            ['utm_source', 'filter', 'filter' => function ($value) {
                if (strlen($value)>=509) {
                    $newValue = substr($value,0,509);
                } else {
                    $newValue = $value;
                }
                return $newValue;
            }],
            ['utm_medium', 'filter', 'filter' => function ($value) {
                if (strlen($value)>=509) {
                    $newValue = substr($value,0,509);
                } else {
                    $newValue = $value;
                }
                return $newValue;
            }],
            ['utm_campaign', 'filter', 'filter' => function ($value) {
                if (strlen($value)>=509) {
                    $newValue = substr($value,0,509);
                } else {
                    $newValue = $value;
                }
                return $newValue;
            }],
            ['utm_term', 'filter', 'filter' => function ($value) {
                if (strlen($value)>=509) {
                    $newValue = substr($value,0,509);
                } else {
                    $newValue = $value;
                }
                return $newValue;
            }],
            ['utm_content', 'filter', 'filter' => function ($value) {
                if (strlen($value)>=509) {
                    $newValue = substr($value,0,509);
                } else {
                    $newValue = $value;
                }
                return $newValue;
            }],
            [['dispatch', 'destination', 'cargo', 'name', 'phone', 'email', 'weight', 'from_page'], 'string', 'max' => 255],
            ['cargo', 'match', 'not'=>true, 'pattern' => '/(базы данных)/i'],
            ['weight', 'match', 'not'=>true, 'pattern' => '/(базы данных)/i'],
            ['text', 'match', 'not'=>true, 'pattern' => '/(базы данных)/i'],
            ['email', 'match', 'not'=>true, 'pattern' => '/(prodawez395@gmail.com)/i'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dispatch' => 'Откуда',
            'destination' => 'Куда',
            'cargo' => 'Груз',
            'name' => 'Имя',
            'phone' => 'Телефон',
            'email' => 'Email',
            'weight' => 'Вес',
            'text' => 'Комментарий',
            'from_page' => 'From Page',

            'utm_source' => 'UTM Source',
            'utm_medium' => 'UTM Medium',
            'utm_campaign' => 'UTM Campaign',
            'utm_term' => 'UTM Term',
            'utm_content' => 'UTM Content',

            'date' => 'Дата',
            'done' => 'Done',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail($subject)
    {


        if ($GLOBALS['YII_APP_MODE']=='DEV') {
            $this->emailForSend = 'quadrosh@gmail.com';
        } elseif ($GLOBALS['YII_APP_MODE']=='PROD') {
            $this->emailForSend = 'sns_tula@mail.ru';
        }

        $client = new Client();
        if ($this->phone!= null) {
            $response = $client->createRequest()
                ->setMethod('post')
                ->setUrl('https://sms.ru/sms/send')
                ->setData([
                    'api_id' => '4940EAEB-EAD2-89D5-E5CE-F61C7FC262EE',
                    'to' => '79853461615', // новый
//                    'to' => '79853461615',
                    'text'=> 'SNSLOGIST.RU - заказ:'
                        . ', тел:'. $this->phone
                        . ', из:'. $this->dispatch
                        . ', в:'. $this->destination
                        . ' груз:'. $this->cargo
                        . ', вес:'. $this->weight
                        . ', '. $this->email
                        . ', '. $this->text

                ])
                ->send();
            if ($response->isOk) {
                Yii::$app->session->setFlash('success','отправлено');
            } else {
                Yii::$app->session->setFlash('error','что-то пошло не так');
            }
        }

        return Yii::$app->mailer->compose()
            ->setTo($this->emailForSend)
            ->setCc(array('quadrosh@gmail.com'))
            ->setFrom('noreply@snslogist.ru')
            ->setSubject($subject)
            ->setHtmlBody(
                "Данные запроса <br>".
                " <br/> Со страницы: ".$this->from_page .
                " <br/> Откуда: ".$this->dispatch .
                " <br/> Куда: ".$this->destination .
                " <br/> Телефон: ".$this->phone .
                " <br/> Email: ".$this->email .
                " <br/> Груз: ".$this->cargo .
                " <br/> Вес: ".$this->weight .
                " <br/> Комментарий: <br/> " .
                nl2br($this->text)
            )
            ->send();



    }
}
