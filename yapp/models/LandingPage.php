<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "landing_page".
 *
 * @property int $id
 * @property string $name
 * @property string $hrurl
 * @property string $seo_logo
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $view
 * @property string $layout
 * @property string $color
 */
class LandingPage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'landing_page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'hrurl', 'seo_logo', 'title', 'description', 'keywords'], 'required'],
            [['seo_logo', 'description', 'keywords'], 'string'],
            [['name', 'hrurl', 'title', 'view', 'layout', 'color'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'hrurl' => 'Hrurl',
            'seo_logo' => 'Seo Logo',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'view' => 'View',
            'layout' => 'Layout',
            'color' => 'Color',
        ];
    }
}
