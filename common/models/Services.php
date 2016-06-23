<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "services".
 *
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property string $text
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $files;
    public $file;

    public static function tableName()
    {
        return 'services';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['text', 'status', 'image'], 'string'],
            [['title', 'image'], 'string', 'max' => 255],
            [['files'], 'file', 'maxFiles' => 5],
            [['file'], 'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'image' => 'Изображение',
            'text' => 'Текст',
            'status' => 'Статус'
        ];
    }

    public function getPath()
    {
        return Yii::getAlias('@frontend/web/images/servise/');
    }

    public function getSeo()
    {
        return $this->hasOne(Seo::className(), ['services_id' => 'id']);
    }
}
