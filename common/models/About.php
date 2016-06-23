<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "about".
 *
 * @property integer $id
 * @property integer $name
 * @property string $position
 * @property string $description
 * @property string $image
 * @property string $status
 */
class About extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $file;

    public static function tableName()
    {
        return 'about';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['file'], 'file'],
            [['description'], 'string', 'max' => 250],
            [['position', 'image', 'status', 'name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'position' => 'Должность',
            'description' => 'Описание',
            'image' => 'Изображение',
            'status' => 'Статус',
            'file' => 'Изображение',
        ];
    }

    public function getPath()
    {
        return Yii::getAlias('@frontend/web/images/about/');
    }

    /**
     * @return string URL of the image
     */
    public function getUrl()
    {
        return Yii::getAlias('@frontendWebroot/images/about/');
    }
}
