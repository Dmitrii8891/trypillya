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
use common\models\SignupForm;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
                         'actions' => ['signup'],
                         'allow' => true,
                         'roles' => ['@'],
                     ],
                     [
                         'actions' => ['index', 'view', 'create', 'update', 'delete'],
                         'allow' => true,
                         'roles' => ['admin'],
                     ],
                     [
                         'actions' => ['index', 'view', 'create', 'update'],
                         'allow' => true,
                         'roles' => ['Moderator', '@'],
                     ],
                     [
                         'actions' => ['index', 'view'],
                         'allow' => true,
                         'roles' => ['contant', '@'],
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
    public function actionIndex()
    {
        $searchModel = new SearchUser();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function pactionPortfolio()
    {
        $portfolio = Portfolio::find()->where(['user_id' => Yii::$app->user->identity->id])->orderBy('id')->all();
        
        return $this->render('portfolio', [
            // 'model' => $this->findModel(Yii::$app->user->identity->id),
            // 'portfolio' => $portfolio,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post())) {
            //отпрака письма на почту с проверкой занесения почты
            if($model->checkbox){
                if ($model->sendEmail2()) {

                    Yii::$app->session->setFlash('success', 'Письмо с логином и паролем отправленно пользователю');

                } else {

                Yii::$app->session->setFlash('error', 'Письмо не отправленно, так как Вы не указали Email');

                }
            }
            //загрузка фалов на сервер с провернкой нужно ли их загружать
            $model->file=UploadedFile::getInstance($model, 'file');

            if($model->file)
            {

            $imageName = md5($model->username);

            $model->file->saveAs('/frontend/web/images/' . $imageName . '.' . $model->file->extension);

            $model->image = '/frontend/web/images/' . $imageName . '.' . $model->file->extension;

            }
            //шифрование пароля после того как мы отправили данные на почту
            $model->password_hash = Yii::$app->security->generatePasswordHash($model->password_hash);
            $model->generateAuthKey();

            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);

            } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
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
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            //отпрака письма на почту с проверкой занесения почты
            if($model->checkbox){
                if ($model->sendEmail2()) {

                    Yii::$app->session->setFlash('success', 'Письмо с логином и паролем отправленно пользователю');

                } else {

                Yii::$app->session->setFlash('error', 'Письмо не отправленно, так как Вы не указали Email');

                }
            }
            //загрузка фалов на сервер с провернкой нужно ли их загружать
            $model->file = UploadedFile::getInstance($model, 'file');
            if($model->file) {

            $image = new User();

            $model->file->saveAs($image->getPath() . $model->file->baseName . '.' . $model->file->extension);

            $model->image = '/frontend/web/images/' . $model->file->baseName . '.' . $model->file->extension;
            }
            //шифрование пароля после того как мы отправили данные на почту
            $model->password_hash = Yii::$app->security->generatePasswordHash($model->password_hash);
            $model->generateAuthKey();

            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);

            } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
