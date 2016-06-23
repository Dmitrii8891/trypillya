<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "achievements".
 *
 * @property integer $id
 * @property string $title
 * @property integer $nomber1
 * @property string $title1
 * @property integer $nomber2
 * @property string $title2
 * @property integer $nomber3
 * @property string $title3
 * @property integer $nomber4
 * @property string $title4
 * @property string $image1
 * @property string $name1
 * @property string $description1
 * @property string $image2
 * @property string $name2
 * @property string $description2
 * @property string $image3
 * @property string $name3
 * @property string $description3
 * @property string $status
 */
class Achievements extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'achievements';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomber1', 'nomber2', 'nomber3', 'nomber4'], 'integer'],
            [['description1', 'description2', 'description3'], 'string'],
            [['title', 'title1', 'title2', 'title3', 'title4', 'image1', 'name1', 'image2', 'name2', 'image3', 'name3', 'status'], 'string', 'max' => 250]
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
            'nomber1' => 'Nomber',
            'title1' => 'Title1',
            'nomber2' => 'Nomber2',
            'title2' => 'Title2',
            'nomber3' => 'Nomber3',
            'title3' => 'Title3',
            'nomber4' => 'Nomber4',
            'title4' => 'Title4',
            'image1' => 'Image1',
            'name1' => 'Name1',
            'description1' => 'Description1',
            'image2' => 'Image2',
            'name2' => 'Name2',
            'description2' => 'Description2',
            'image3' => 'Image3',
            'name3' => 'Name3',
            'description3' => 'Description3',
            'status' => 'Status',
        ];
    }
}
