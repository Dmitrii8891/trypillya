<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "seo".
 *
 * @property integer $id
 * @property string $title
 * @property string $keywords
 * @property string $description
 * @property integer $portfolio_id
 * @property integer $about_id
 */
class Seo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['keywords', 'description'], 'string'],
            ['slug', 'unique', 'targetClass' => '\common\models\Seo', 'message' => 'этот адрес уже используеться'],
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
            'keywords' => 'Keywords',
            'description' => 'Description',
            'slug' => 'Url',
        ];
    }
    
    public function getPortfolio()
    {
        return $this->hasOne(Portfolio::className(), ['id' => 'portfolio_id']);
    }
    
    public function getAboutas()
    {
        return $this->hasOne(Aboutas::className(), ['id' => 'about_id']);
    }

    public function getService()
    {
        return $this->hasOne(Services::className(), ['id' => 'services_id']);
    }
    
    public function signup()
    {
        if ($this->validate()) {
            $user = new Seo();
            $user->save();
        }

        return null;
    }
}
