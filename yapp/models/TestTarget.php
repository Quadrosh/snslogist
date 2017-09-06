<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test_target".
 *
 * @property int $id
 * @property int $testpage_id
 * @property string $name
 * @property string $link
 * @property int $achieve
 */
class TestTarget extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'test_target';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['testpage_id'], 'required'],
            [['testpage_id', 'achieve'], 'integer'],
            [['name', 'link'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'testpage_id' => 'Testpage ID',
            'name' => 'Name',
            'link' => 'Link',
            'achieve' => 'Achieve',
        ];
    }
}
