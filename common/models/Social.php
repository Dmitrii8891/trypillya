<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "social_network".
 *
 * @property integer $id
 * @property string $title
 * @property string $link
 * @property string $status
 */
class Social extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $file;

    public static function tableName()
    {
        return 'social_network';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['link'], 'string'],
            [['file'], 'file'],
            [['title', 'status', 'image'], 'string', 'max' => 255],
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
            'link' => 'Link',
            'status' => 'Status',
            'image' => 'Изображение',
            'file' => 'Изображение'
        ];
    }

    public function getPath()
    {
        return Yii::getAlias('@frontend/web/images/social/');
    }

    /**
     * @return string URL of the image
     */
    public function getUrl()
    {
        return Yii::getAlias('@frontendWebroot/images/social/');
    }
}
