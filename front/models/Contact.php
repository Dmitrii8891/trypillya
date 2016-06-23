<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class Contact extends Model
{
    //     
    public $name;
    public $phone;
    public $message;
    public $company;
    public $email = 'dmitrii8891@gmail.com';


    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'phone'], 'required'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'phone' => '',
            'name' => ''
        ];
    }

    public function sendEmail()
    {
            //var_dump($_POST['name']);die();
           // $content = null;
         $name = $_POST['name'];
         $phone = $_POST['phone'];
            $content = null;
            $content .= '<p>Name:' . $name . '</p>';
            $content .= '<p>Телефон' . $phone . '</p>';
                Yii::$app->mailer->compose('@common/mail/layouts/html', ['content' => $content])
                    ->setTo($email = ['dmitrii8891@gmail.com',
                                      'a.fesh@proektant.net1111'])
                    ->setFrom([$this->email => $this->name])
                    ->setSubject($this->name)
                    //->setTextBody($this->body)
                    ->send();

                return true;
    }

    public function sendEmail2()
    {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $company = $_POST['company'];
        $email = $_POST['email'];
        $message = $_POST['message'];
            $content = null;
            $content .= '<p>Name: ' . $name . '</p>';
            $content .= '<p>Компания ' . $company . '</p>';
            $content .= '<p>Телефон ' . $phone . '</p>';
            $content .= '<p>Email ' . $email . '</p>';
            $content .= '<p>Текст ' . $message . '</p>';
                Yii::$app->mailer->compose('@common/mail/layouts/html', ['content' => $content])
                    ->setTo($email = ['dmitrii8891@gmail.com',
                                      'a.fesh@proektant.net1111'])
                    ->setFrom([$this->email => $this->name])
                    ->setSubject($this->name)
                    //->setTextBody($this->body)
                    ->send();

                return true;
    }

    public function sendEmail3()
    {
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $message = $_POST['message'];
            $content = null;
            $content .= '<p>Телефон ' . $phone . '</p>';
            $content .= '<p>Email ' . $email . '</p>';
            $content .= '<p>Вопрос ' . $message . '</p>';
                Yii::$app->mailer->compose('@common/mail/layouts/html', ['content' => $content])
                    ->setTo($email = ['dmitrii8891@gmail.com',
                                      'a.fesh@proektant.net2222'])
                    ->setFrom([$this->email => $this->name])
                    ->setSubject($this->name)
                    //->setTextBody($this->body)
                    ->send();

                return true;
    }


}
