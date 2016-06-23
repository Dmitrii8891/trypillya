<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "aboutas".
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 */
class Aboutas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aboutas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'text' => 'Text',
        ];
    }
    
    public function getSeo()
    {
        return $this->hasOne(Seo::className(), ['about_id' => 'id']);
    }
}
