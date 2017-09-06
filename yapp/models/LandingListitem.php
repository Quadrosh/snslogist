<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "landing_listitem".
 *
 * @property int $id
 * @property int $section_id
 * @property int $order_num
 * @property string $head
 * @property string $discr
 * @property string $text
 * @property string $extra
 * @property string $image
 * @property string $image_alt
 */
class LandingListitem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'landing_listitem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['section_id'], 'required'],
            [['section_id', 'order_num'], 'integer'],
            [['text', 'extra', 'image'], 'string'],
            [['head', 'discr', 'image_alt'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'section_id' => 'Section ID',
            'order_num' => 'Order Num',
            'head' => 'Head',
            'discr' => 'Discr',
            'text' => 'Text',
            'extra' => 'Extra',
            'image' => 'Image',
            'image_alt' => 'Image Alt',
        ];
    }
}
