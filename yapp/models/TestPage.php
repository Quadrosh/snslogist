<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test_page".
 *
 * @property int $id
 * @property int $test_id
 * @property string $hrurl
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $pagehead
 * @property string $pagedescription
 * @property string $text
 * @property string $imagelink
 * @property string $imagelink_alt
 * @property string $sendtopage
 * @property string $promolink
 * @property string $promoname
 * @property string $layout
 */
class TestPage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'test_page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['test_id'], 'required'],
            [['test_id','sendtopage'], 'integer'],
            [['description', 'keywords', 'pagedescription', 'text'], 'string'],
            [['hrurl', 'title', 'pagehead', 'imagelink', 'imagelink_alt', 'promolink', 'promoname', 'layout','view'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'test_id' => 'Test ID',
            'hrurl' => 'Hrurl',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Примечание',
            'pagehead' => 'Pagehead',
            'pagedescription' => 'Pagedescription',
            'text' => 'HTML',
            'imagelink' => 'Imagelink',
            'imagelink_alt' => 'Imagelink Alt',
            'sendtopage' => 'Просмотры',
            'promolink' => 'Promolink',
            'promoname' => 'Promoname',
            'layout' => 'Custom Layout',
            'view' => 'Custom View',
        ];
    }
}
