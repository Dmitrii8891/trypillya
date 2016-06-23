<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use backend\models\SearchUser;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use common\models\Portfolio;
use backend\models\PortfolioSearch;

class CabinetController extends Controller
{
    public function behaviors()
     {
         return [
             'access' => [
                 'class' => AccessControl::className(),
                 'rules' => [
                     [
                         'actions' => ['login', 'error'],
                         'allow' => true,
                     ],
                     [
                         'actions' => ['index', 'view', 'create', 'update', 'delete', 'portfolio', 'profile'],
                         'allow' => true,
                         'roles' => ['@'],
                     ],
                     [
                         'actions' => ['index', 'view'],
                         'allow' => true,
                         'roles' => ['contant'],
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

     public function beforeAction($action) {
        $this->enableCsrfValidation = ($action->id !== ['update', 'create']); 
        return parent::beforeAction($action);
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionPortfolio()
    {
        $portfolio = Portfolio::find()->where(['user_id' => Yii::$app->user->identity->id])->orderBy('id')->all();
        return $this->render('index', [
            'model' => $this->findModel(Yii::$app->user->identity->id),
            'portfolio' => $portfolio,
        ]);
    }
    
    public function actionProfile()
    {
        $user = User::find()->all();
        $searchModel = new PortfolioSearch(['user_id' => Yii::$app->user->identity->id]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('profile', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'user' => $user,
        ]);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

