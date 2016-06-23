<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\User;
use common\models\Portfolio;
use backend\models\SearchUser;
use yii\web\UploadedFile;
use common\models\AuthAssignment;

/**
 * Site controller
 */
class UserController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
     {
         return [
             'access' => [
                 'class' => AccessControl::className(),
                 'rules' => [
                     [
                         'actions' => ['login', 'error', 'planers'],
                         'allow' => true,
                     ],
                     [
                         'actions' => ['index', 'update'],
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
            'upload' => [
                  'class' => 'troy\ImageUpload\UploadAction',
                  'successCallback' => [$this, 'successCallback'],
                  'beforeStoreCallback' => [$this,'beforeStoreCallback']
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
        $portfolio = Portfolio::find()->where(['user_id' => Yii::$app->user->identity->id])->orderBy('id')->all();
        return $this->render('index', [
            'model' => $this->findModel(Yii::$app->user->identity->id),
            'portfolio' => $portfolio,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $imageName = md5($model->username);

            $model->file=UploadedFile::getInstance($model, 'file');

            if($model->file)
            {

            $user = new User();

            $model->file->saveAs($user->getPath() . $imageName . '.' . $model->file->extension);

            $model->image = '/frontend/web/images/' . $imageName . '.' . $model->file->extension;

            }

            $model->save();

            return $this->redirect('index');
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionPlaners_all() 
    {
        $user = AuthAssignment::find()->where(['item_name' => 'planners'])->all();

         return $this->render('planers_all', [
                'user' => $user,
            ]);

    }
    
    
    public function actionPlaners($id)
    {
        $model = User::find()->where(['id' => $id])->all();
        $name = $model[0]->last_name;
        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => "Проектант $name. Комплексное проектировании объектов строительства. Компания TRP"]);
        return $this->render('planers', [
            'model' => $model,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

      public function successCallback($store,$file)
      {
      }
      public function beforeStoreCallback($file)
      {
      }
}
