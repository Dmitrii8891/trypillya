<?php

namespace backend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class UserEmail extends Model
{

    public function rules()
    {
        return [
            [['email', 'password_hash'], 'string'],
            ['email', 'email'],
        ];
    }
    //функция отправки письма на почту user->email
    public function sendEmail()
    {
        return Yii::$app->mailer->compose()
                    ->setFrom('from@domain.com')
                    ->setTo($model->email)
                    ->setSubject('Your password and login')
                    ->setTextBody('Hello')
                    ->setHtmlBody('Hello, this is your login'.' '.$model->username.' '. 'and your password'.' '.$model->password_hash)
                    ->send();
    }
}
