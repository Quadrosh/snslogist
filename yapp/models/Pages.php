<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pages".
 *
 * @property int $id
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
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description','hrurl' ], 'required'],
            [['hrurl'],'unique'],
            [['description', 'seo_logo','keywords', 'pagedescription', 'text'], 'string'],
            [['title', 'pagehead', 'imagelink', 'hrurl', 'imagelink_alt', 'sendtopage', 'promolink', 'promoname','layout','view'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'seo_logo' => 'SEO logo (title для копирования Title)',
            'hrurl' => 'hrurl',
            'title' => 'Title',
            'description' => 'meta Description',
            'keywords' => 'meta Keywords',
            'pagehead' => 'Pagehead H1',
            'pagedescription' => 'Pagedescription',
            'text' => 'Text',
            'imagelink' => 'Imagelink',
            'imagelink_alt' => 'Imagelink Alt',
            'sendtopage' => 'Sendtopage',
            'promolink' => 'Promolink',
            'promoname' => 'Promoname',
            'layout' => 'Custom Layout',
            'view' => 'Custom View',
        ];
    }
}
