<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "portfolio".
 *
 * @property integer $id
 * @property string $title
 * @property string $image1
 * @property string $object
 * @property string $location
 * @property string $area
 * @property string $client
 * @property string $task
 * @property string $city
 * @property string $project_manadger
 * @property string $team
 * @property string $text1
 * @property string $video
 * @property string $text2
 * @property string $image2
 * @property string $description
 * @property string $map
 * @property integer $user_id
 * @property string $status
 * @property integer $rating
 */
class Portfolio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public $file1;
    public $file12;
    public $file2;
    public $vk;
    public $city;
    public $teams;


    public static function tableName()
    {
        return 'portfolio';
    }


    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text1', 'video', 'text2', 'description', 'map', 'vk', 'object'], 'string'],
            [['publication'], 'safe'],
            [['user_id', 'object', 'area', 'client', 'task', 'project_manadger', 'team', 'year'], 'required'],
            [['user_id', 'rating', 'id', 'coordinate_id'], 'integer'],
            [['teams'], 'safe'],
            [['image', 'location', 'area', 'client', 'task', 'year', 'project_manadger', 'image2', 'status', 'slug'], 'string', 'max' => 255],
            [['file2'], 'file',
                'maxFiles' => 3
            ],
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
            'image1' => 'Изображение',
            'object' => 'Объект',
            'location' => 'Локация',
            'area' => 'Площадь',
            'client' => 'Клиент',
            'task' => 'Задача',
            'year' => 'Год',
            'project_manadger' => 'Руководитель проекта',
            'team' => 'Команда',
            'text1' => 'Описание фото галереи(краткое описание проэкта)',
            'video' => 'Видео',
            'text2' => 'Описание видео(продолжение описание проэкта)',
            'image2' => 'Изображение плана здания',
            'description' => 'Описание плана',
            'map' => 'Карта',
            'name' => 'Потзователь',
            'status' => 'Статус',
            'rating' => 'Рейтинг',
            'coordinate_id' => '',
            'file' => 'Изображение плана',
            'file1' => 'Фото на главной',
            'file2' => 'Галерея фотографий',
            'publication' => 'Опубликовать в списке лучших работ',
            'slug' => 'Url',
            'user_id' => 'Автор'
        ];
    }

    public function getPortfolio()
    {
        return $this->hasOne(Portfolio::className(), ['user_id' => 'id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getCoordenats()
    {
        return $this->hasOne(Coordinates::className(), ['id' => 'coordinate_id']);
    }
    
    public function getPath()
    {
        return Yii::getAlias('@frontend/web/images/');
    }
    public function getSeo()
    {
        return $this->hasOne(Seo::className(), ['portfolio_id' => 'id']);
    }
    
    public function getName()
    {
        return $this->user->username;
    }
    
    

}
