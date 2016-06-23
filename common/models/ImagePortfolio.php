<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "image_portfolio".
 *
 * @property integer $id
 * @property string $image
 * @property integer $portfolio_id
 */
class ImagePortfolio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'image_portfolio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['portfolio_id'], 'required'],
            [['portfolio_id'], 'integer'],
            [['image'], 'safe'],
            [['name'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'portfolio_id' => 'Portfolio ID',
        ];
    }
    
    public function getImage()
    {
        return $this->hasOne(Portfolio::className(), ['id' => 'portfolio_id']);
    }
}
