<?php

namespace backend\controllers;

use Yii;
use common\models\Services;
use backend\models\ServicesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\ImagesServices;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\helpers\Url;

/**
 * ServicesController implements the CRUD actions for Services model.
 */
class ServicesController extends Controller
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
                         'actions' => ['index', 'view', 'create', 'update', 'delete', 'signup', 'deleteimag', 'deleteteam', 'image', 'show', 'deletimage'],
                         'allow' => true,
                         'roles' => ['admin'],
                     ],
                     [
                         'actions' => ['index', 'view', 'create', 'update', 'deleteimag', 'show'],
                         'allow' => true,
                         'roles' => ['Moderator'],
                     ],
                     [
                         'actions' => ['index', 'view', 'show'],
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

    /**
     * Lists all Services models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ServicesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Services model.
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
     * Creates a new Services model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Services();
        $image = new ImagesServices();
        $imagesServices = ImagesServices::find()
                        ->where(['services_id' => $model->id])
                        ->all();

        if ($model->load(Yii::$app->request->post())) {

            $model->file = UploadedFile::getInstance($model, 'file');
            
            //var_dump($model->file);die();
            if($model->file) {
                $imageName = md5(uniqid($model->file->baseName));
                $model->file->saveAs($model->getPath() . $imageName . '.' . $model->file->extension);
                $model->image = '/frontend/web/images/servise/' . $imageName . '.' . $model->file->extension;
                //var_dump($model->image);die();
            }

            $model->save();

            $model->files = UploadedFile::getInstances($model, 'files');
            
            if($model->files) {
                foreach ($model->files as $file) {
                    $imageName = md5(uniqid($file->baseName));
                    $file->saveAs($model->getPath() . $imageName . '.' . $file->extension);
                    $imageSave = '/frontend/web/images/servise/' . $imageName . '.' . $file->extension;
                    Yii::$app->db->createCommand()->insert('images_services', [
                    'services_id' => $model->id,
                    'image' => $imageSave,
                    ])->execute();
                }
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'imagesServices' => $imagesServices,
            ]);
        }
    }

    /**
     * Updates an existing Services model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $image = new ImagesServices();
        $imagesServices = ImagesServices::find()
                        ->where(['services_id' => $model->id])
                        ->all();

        if ($model->load(Yii::$app->request->post())) {

            $model->file = UploadedFile::getInstance($model, 'file');
            
            //var_dump($model->file);die();
            if($model->file) {
                $imageName = md5(uniqid($model->file->baseName));
                $model->file->saveAs($model->getPath() . $imageName . '.' . $model->file->extension);
                $model->image = '/frontend/web/images/servise/' . $imageName . '.' . $model->file->extension;
                //var_dump($model->image);die();
            }

            $model->save();

            $model->files = UploadedFile::getInstances($model, 'files');
            
            if($model->files) {
                foreach ($model->files as $file) {
                    $imageName = md5(uniqid($file->baseName));
                    $file->saveAs($model->getPath() . $imageName . '.' . $file->extension);
                    $imageSave = '/frontend/web/images/servise/' . $imageName . '.' . $file->extension;
                    Yii::$app->db->createCommand()->insert('images_services', [
                    'services_id' => $model->id,
                    'image' => $imageSave,
                    ])->execute();
                }
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'imagesServices' => $imagesServices,
            ]);
        }
    }

    /**
     * Deletes an existing Services model.
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
     * @param integer $id 
     * @param integer $image
     * @return redirect 
     */
    public function actionDeletimage($id, $image)
    {
        $image = ImagesServices::findOne($image);
        // try find adn delet file if file not found
        // delete write db 
        try {
            unlink($_SERVER['DOCUMENT_ROOT'].$image->image);
        } catch(yii\base\ErrorException  $e) {
            $image->delete();
            return Yii::$app->response->redirect(Url::to(['update', 'id' => $id]));
        }

        $image->delete();
        return Yii::$app->response->redirect(Url::to(['update', 'id' => $id]));
    }

    /**
     * Finds the Services model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Services the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Services::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
