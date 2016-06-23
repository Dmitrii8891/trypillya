<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cntact".
 *
 * @property integer $id
 * @property string $addres
 * @property string $phone_footer
 * @property string $phone_all
 */
class Cntact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cntact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['addres', 'phone_footer'], 'string', 'max' => 255],
            [['phone_all'], 'string', 'max' => 600]
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
            'phone_footer' => 'Телефон(низ сайта) и раздел контакты',
            'phone_all' => 'Все телефоны(раздел контакты)',
        ];
    }

    public function contactAll()
    {
        return self::find()->where(['id' => 1])->one();
    }
}
