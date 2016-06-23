<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "images_services".
 *
 * @property integer $id
 * @property string $image
 * @property integer $services_id
 * @property integer $articles_id
 */
class ImagesServices extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'images_services';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['services_id', 'articles_id'], 'integer'],
            [['image'], 'string', 'max' => 255]
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
            'services_id' => 'Services ID',
            'articles_id' => 'Articles ID',
        ];
    }

    public function getPath()
    {
        return Yii::getAlias('@frontend/web/images/');
    }
}
