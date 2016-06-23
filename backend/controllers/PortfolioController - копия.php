<?php

namespace backend\controllers;

use Yii;
use common\models\Portfolio;
use backend\models\PortfolioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\User;
use common\models\Coordinates;
use yii\web\UploadedFile;
use rico\yii2images\models\Image;
use yii\helpers\Url;
use common\models\Images;
use common\models\Uploadimg;
use yii\filters\AccessControl;
use common\models\ImagePortfolio;
/**
 * PortfolioController implements the CRUD actions for Portfolio model.
 */
class PortfolioController extends Controller
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
                         'actions' => ['index', 'view', 'create', 'update', 'delete', 'signup', 'deleteimag', 'image'],
                         'allow' => true,
                         'roles' => ['admin'],
                     ],
                     [
                         'actions' => ['index', 'view', 'create', 'update', 'deleteimag'],
                         'allow' => true,
                         'roles' => ['Moderator'],
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
     * Lists all Portfolio models.
     * @return mixed
     */
    public function actionIndex()
    {
        $user = User::find()->all();
        $searchModel = new PortfolioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'user' => $user,
        ]);
    }

    public function actions()
      {
          return [
              'upload' => [
                  'class' => 'troy\ImageUpload\UploadAction',
                  'successCallback' => [$this, 'successCallback'],
                  'beforeStoreCallback' => [$this,'beforeStoreCallback']
              ],
          ];
      }
      public function successCallback($store,$file)
      {
      }
      public function beforeStoreCallback($file)
      {
      }


    public function actionShow($id)
    {
        $user = User::findOne($id);
        $portfolio = Portfolio::find()
        ->where(['user_id' => $id])
        ->orderBy('id')->all();
        return $this->render('show', [
            //'model' => $this->findModel(Yii::$app->user->identity->id),
            'portfolio' => $portfolio,
            'user' => $user,
        ]);
    }
    
    public function actionCity($id)
    {
        $model = new Coordinates();
        //var_dump($model->getCity($id));die();
        $test = $model->getCity($id);
            foreach ( $test as $value) {
                echo "<option value='".$value['title']."'>".$value['title']."</option>" ;
            }
        //return $model->getCity($id);
        
    }

    /**
     * Displays a single Portfolio model.
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
     * Creates a new Portfolio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {   
        $uploadimg = new Uploadimg();
        $model = new Portfolio();
        $coordinate = new Coordinates();
        $user =  User::find()->all();

        //проверяем загружены ли данные с формы иесли загруженны то сохраняем по очереди
        if ($model->load(Yii::$app->request->post()) && $coordinate->load(Yii::$app->request->post())) {

            /* ====== File download this model (загрузка фалов для этой модели) ======= */
            $uploadimg->file12 = UploadedFile::getInstance($uploadimg, 'file12');
            
            if($uploadimg->file12) {
            $imageName = md5(uniqid($uploadimg->file12->baseName));
            $uploadimg->file12->saveAs($uploadimg->getPath() . $imageName . '.' . $uploadimg->file12->extension);
            $model->image1 = '/frontend/web/images/' . $imageName . '.' . $uploadimg->file12->extension;
            }
            
            $uploadimg->file = UploadedFile::getInstance($uploadimg, 'file');
            //
            if($uploadimg->file) {
            $imageName = md5(uniqid($uploadimg->file->baseName));
            $uploadimg->file->saveAs($uploadimg->getPath() . $imageName . '.' . $uploadimg->file->extension);
            
            $model->image2 = '/frontend/web/images/' . $imageName . '.' . $uploadimg->file->extension;
            }
            /* ====== (end file) ======= */

            // мринимаем строкой параметр team и заносим в базу разделив значение запятой
            if($model->teams != null){
                $test = implode(",", $model->teams);
            $model->teams = $test;
            $model->coordinate_id = $coordinate->id;
            $model->team = $model->teams;
            } 



            $model->file2 = $_FILES['file'];
            if ($model->file2){
                //$model->map = 1;
            }
            
            $coordinate->save();
            $model->location = $coordinate->city;
            $model->coordinate_id = $coordinate->id;
            $model->save();
            
            
        //после того как файлы загрузились ajax записываем значение в базу (action для загрузки файлов ajax ниже)
            //загружаем таким образом потому что предварительно незнаем id текущей записи

            //Принимаем записи через сесию и записую в базу!
           if ($model->file2) {
               $i = 1;
                foreach ($model->file2 as $key) {
                 if($_SESSION['image3'] || $_SESSION['image2'] || $_SESSION['image1']){
                    $a = '/frontend/web/upload/'.basename($_SESSION['image'.$i]);  
                try {
                    Yii::$app->db->createCommand()->insert('image_portfolio', [
                    'portfolio_id' => $model->id,
                    'image' => $a,
                    ])->execute();
                } catch (yii\db\IntegrityException $ex) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
                $_SESSION['image'.$i] = null; 
                $i++;
                }
                }
                $_SESSION['image3'] = null; $_SESSION['image2'] = null; $_SESSION['image1'] = null;
            }
           $coordinate->save();
            
            return $this->redirect(['view', 'id' => $model->id]);
            //обнуляем сесию
        } else {
            if(isset($_SESSION)){
                $_SESSION['image3'] = null;
                $_SESSION['image2'] = null;
                $_SESSION['image1'] = null;
            }
            return $this->render('create', [
                'model' => $model,
                'coordinate' => $coordinate,
                'user' => $user,
                'uploadimg' => $uploadimg,
            ]);
        }
    }

    /**
     * Updates an existing Portfolio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        
        $uploadimg = new Uploadimg();
        $image_portfolio = new ImagePortfolio();
        $image_find =  ImagePortfolio::find()->where(['portfolio_id' => $id])->all();
        $model = $this->findModel($id);
        $coordinate = Coordinates::find()->where(['id' => $model->coordinate_id])->one();
        $user =  User::find()->all();
        // $coordinate = Image::find()->where(['id' => $model->coordinate_id])->one();

        //проверяем загружены ли данные с формы иесли загруженны то сохраняем по очереди
        //сначала table cordinate потом model

        /* ====== File download this model (загрузка фалов для этой модели) ======= */
        
         if ($model->load(Yii::$app->request->post()) && $coordinate->load(Yii::$app->request->post())) {

            $uploadimg->file123 = UploadedFile::getInstance($uploadimg, 'file123');
            
            if($uploadimg->file123) {
            $imageName = md5(uniqid($uploadimg->file123->baseName));
            $uploadimg->file123->saveAs($uploadimg->getPath() . $imageName . '.' . $uploadimg->file123->extension);
            $model->image1 = '/frontend/web/images/' . $imageName . '.' . $uploadimg->file123->extension;
            }
            
            $uploadimg->file1 = UploadedFile::getInstance($uploadimg, 'file1');
            //
            if($uploadimg->file1) {
            $imageName = md5(uniqid($uploadimg->file1->baseName));
            $uploadimg->file1->saveAs($uploadimg->getPath() . $imageName . '.' . $uploadimg->file1->extension);
            
            $model->image2 = '/frontend/web/images/' . $imageName . '.' . $uploadimg->file1->extension;
            }

            /* ====== (end file) ======= */

            // мринимаем строкой параметр team и заносим в базу разделив значение запятой
            
            if($model->teams != null){
                $test = implode(",", $model->teams);
            $model->teams = $test;
            $model->coordinate_id = $coordinate->id;
            $model->team = $model->teams;
            } 
            
            $model->file2 = $_FILES['file'];
            
            if ($model->file2){
                $coordinate->portfolio_id = 2;
            }
            $model->save();
            $coordinate->save();
           

           //после того как файлы загрузились ajax записываем значение в базу (action для загрузки файлов ajax ниже)
            //загружаем таким образом потому что предварительно незнаем id текущей записи
            // при update от этого можно избавиться тк бедет известеy id

            //Принимаем записи через сесию и записую в базу!
            
            
            if ($model->file2) {
               $i = 1;
               var_dump($_SESSION['image1']);die();
                foreach ($model->file2 as $key) {
                 if($_SESSION['image3'] || $_SESSION['image2'] || $_SESSION['image1']){
                    $a = '/frontend/web/upload/'.basename($_SESSION['image'.$i]);  
                try {
                    Yii::$app->db->createCommand()->insert('image_portfolio', [
                    'portfolio_id' => $model->id,
                    'image' => $a,
                ])->execute();
                } catch (yii\db\IntegrityException $ex) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
                $_SESSION['image'.$i] = null; 
                $i++;
                }
                }
                $_SESSION['image3'] = null; $_SESSION['image2'] = null; $_SESSION['image1'] = null;
            }
           
            
            return $this->redirect(['view', 'id' => $model->id]);
            //обнуляем сесию
        } else {
            if(isset($_SESSION)){
                $_SESSION['image3'] = null;
                $_SESSION['image2'] = null;
                $_SESSION['image1'] = null;
            }
            return $this->render('update', [
                'model' => $model,
                'coordinate' => $coordinate,
                'user' => $user,
                'uploadimg' => $uploadimg,
                'image_find' => $image_find,
            ]);
        }
    }



    public function actionImage()
    {
        
        // upload.php
// 'images' refers to your file input name attribute
      //return var_dump(1);die;

 //return var_dump($files);die();
// get the files posted
$images = $_FILES['file'];
 
// get user id posted
$userid = empty($_POST['userid']) ? '' : $_POST['userid'];
 
// get user name posted
$username = empty($_POST['username']) ? '' : $_POST['username'];
 
// a flag to see if everything is ok
$success = null;
 
// file paths to store
$paths= [];
 
// get file names
$filenames = $images['name'];
 
// loop and process files
//session_start();
for($i=0; $i < count($filenames); $i++){
    $ext = explode('.', basename($filenames[$i]));
    $pat = Yii::getAlias('@frontend/web/upload/');
    $target = $pat . DIRECTORY_SEPARATOR . md5(uniqid()) . "." . array_pop($ext);
    
    if(!move_uploaded_file($images['tmp_name'][$i], $target)) {
        $success = true;
        $_SESSION['image1'] = null;
        $_SESSION['image2'] = null;
        $_SESSION['image3'] = null;
            if($_SESSION['image1'] == null) {
                
                $_SESSION['image1']=$target;
                //var_dump($_SESSION['image1']);die();
                //return var_dump($_SESSION['image1']);die();
            } else {
                if($_SESSION['image2'] == null) {
                    $_SESSION['image2']=$target;
                } else {
                    $_SESSION['image3']=$target;
                }
            }
         
        $paths[] = $target;
        
    }
}
 
// check and process based on successful status 
if ($success === true) {
    // call the function to save all data to database
    // code for the following function `save_data` is not 
    // mentioned in this example
    //save_data($userid, $username, $paths);
 
    // store a successful response (default at least an empty array). You
    // could return any additional response info you need to the plugin for
    // advanced implementations.
    $output = [];
    // for example you can get the list of files uploaded this way
    // $output = ['uploaded' => $paths];
} elseif ($success === false) {
    $output = ['error'=>'Error while uploading images. Contact the system administrator'];
    // delete any uploaded files
    foreach ($paths as $file) {
        unlink($file);
    }
} else {
    $output = ['error'=>'No files were processed.'];
}
 
// return a json encoded response for plugin to process successfully
return json_encode($output);
    }

    /**
     * Deletes an existing Portfolio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {   
        //$model->removeImages();
        $model = $this->findModel($id);
        
        $coordinate = Coordinates::findOne($model->coordinate_id)->delete();

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDeleteimag($id, $model)
    {   
        //$model->removeImages();
        $image = ImagePortfolio::findOne($id)->delete();

        return Yii::$app->response->redirect(Url::to(['update', 'id' => $model]));
    }

    /**
     * Finds the Portfolio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Portfolio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Portfolio::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
