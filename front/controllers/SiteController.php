<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Coordinates;
use common\models\Portfolio;
use common\models\About;
use common\models\Work;
use common\models\Aboutas;
use yii\data\Pagination;
use frontend\models\Contact;
use common\models\Orders;
use common\models\AuthAssignment;
use common\models\Achievements;
use common\models\Seo;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        
        
        

        $portfolioall = Portfolio::find()
            ->where(['publication' => 1, 'status' => 'publichen'])
            ->orderBy('rating DESC')
            ->limit(10)
            ->all();
            //var_dump($portfolioall);die();
        
        $ach = Achievements::find()->where(['id' => 1])->one();

        $model = Portfolio::find()->where(['status' => 'publichen'])->orderBy('rating DESC')->all();

        $about = About::find()->all();

        $work = Work::find()->all();
        
        
        $seo = Seo::find()->where(['id' => 1])->one();
        $description = $seo->description;
        $keywords = $seo->keywords;
        
        Yii::$app->view->registerMetaTag([
                    'name' => 'description',
                    'content' => $keywords,
            ]);
        Yii::$app->view->registerMetaTag([
                    'name' => 'keywords',
                    'content' => $description,
            ]);

        return $this->render('index', [
            'model' => $model,
            'about' => $about,
            'work' => $work,
            'portfolioall' => $portfolioall,
            'ach' => $ach,
            'seo' => $seo,
        ]);
    }

    public function actionAbout()
    {
        $portfolioall = Portfolio::find()
            ->where(['publication' => 1, 'status' => 'publichen'])
            ->orderBy('rating DESC')
            ->limit(10)
            ->all();
        
        
        $seo = Aboutas::find()
                ->joinWith('seo')
                ->where(['seo.about_id' => 1])
                ->one();

        $model = Aboutas::find()->where(['id' => 1])->one();
        if(isset($seo->id)){
            $description = $model->seo->description;
            $keywords = $model->seo->keywords;

            Yii::$app->view->registerMetaTag([
                        'name' => 'description',
                        'content' => $keywords,
                ]);
            Yii::$app->view->registerMetaTag([
                        'name' => 'keywords',
                        'content' => $description,
                ]);
        }
        

         return $this->render('aboutas', [
                'model' => $model,
                'portfolioall' => $portfolioall,
            ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new Contact();
        $orders = new Orders();
        $models = new Contact();

        $model->name = $name = $_POST['name'];
        $model->phone = $phone = $_POST['phone'];

        $orders->name = $name;
        $orders->phone = $phone;
        $orders->title = 'Контакты';
        $orders->save();

        if($models->sendEmail()) {
            Yii::$app->session->setFlash('success', 'Yes.');
        } else {
            Yii::$app->session->setFlash('success', 'No.');
        }
               return Yii::$app->getResponse()->redirect(Yii::$app->getHomeUrl());

    }

    public function actionContact2()
    {
        $model = new Contact();
        $orders = new Orders();


        $model->name = $name = $_POST['name'];
        $model->phone = $phone = $_POST['phone'];
        $model->company = $company = $_POST['company'];
        $model->email = $email = $_POST['email'];
        $model->message = $message = $_POST['message'];

        $orders->name = $name;
        $orders->phone = $phone;
        $orders->company = $company;
        $orders->email = $email;
        $orders->message = $message;
        $orders->title = 'Заказать проект';
        $orders->save();

        if($model->sendEmail2()) {
            Yii::$app->session->setFlash('success', 'Yes.');
        } else {
            Yii::$app->session->setFlash('success', 'No.');
        }
               return Yii::$app->getResponse()->redirect(Yii::$app->getHomeUrl());
    }

  
    public function actionContact3()
    {
        $model = new Contact();
        $orders = new Orders();

        //$models->load(Yii::$app->request->post());
        $model->name = $name = $_POST['name'];
        $model->phone = $phone = $_POST['phone'];
        $model->company = $company = $_POST['company'];
        $model->email = $email = $_POST['email'];
        $model->message = $message = $_POST['message'];
        //var_dump($_POST['name']);die();

        $orders->name = $name;
        $orders->phone = $phone;
        $orders->company = $company;
        $orders->email = $email;
        $orders->message = $message;
        $orders->title = 'Расчет проекта';
        $orders->save();

        if($model->sendEmail2()) {
            Yii::$app->session->setFlash('success', 'Yes.');
        } else {
            Yii::$app->session->setFlash('success', 'No.');
        }
               return Yii::$app->getResponse()->redirect(Yii::$app->getHomeUrl());
    }

    public function actionContact4()
    {

        $model = new Contact();
        $orders = new Orders();

        $model->phone = $phone = $_POST['phone'];
        $model->email = $email = $_POST['email'];
        $model->message = $message = $_POST['message'];

        $orders->phone = $phone;
        $orders->email = $email;
        $orders->message = $message;
        $orders->title = 'Остались вопросы';
        $orders->save();

        if($model->sendEmail3()) {
            Yii::$app->session->setFlash('success', 'Yes.');
        } else {
            Yii::$app->session->setFlash('success', 'No.');
        }
               return Yii::$app->getResponse()->redirect(Yii::$app->getHomeUrl());
    }


    // public function actionContact()
    // {
    //     $model = new ContactForm();
    //     if ($model->load(Yii::$app->request->post()) && $model->validate()) {
    //         if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
    //             Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
    //         } else {
    //             Yii::$app->session->setFlash('error', 'There was an error sending email.');
    //         }

    //         return $this->refresh();
    //     } else {
    //         return $this->render('contact', [
    //             'model' => $model,
    //         ]);
    //     }
    // }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    // public function actionAbout()
    // {
    //     return $this->render('about');
    // }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
    
    protected function findModel($id)
    {
        if (($model = Portfolio::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
