<?php

namespace common\models;

use Yii;

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
class Contact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

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
            [['addres', 'phone_footer', 'phone_all'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'addres' => 'Адрес',
            'phone_footer' => 'Телефон',
            'phone_all' => 'Все  телефоны'
        ];
    }
}
