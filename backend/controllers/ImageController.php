<?php

namespace backend\controllers;

use backend\models\MultipleUploadForm;
use common\models\Portfolio;
use Yii;
use common\models\Image;
use backend\models\ImageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * ImageController implements the CRUD actions for Image model.
 */
class ImageController extends Controller
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
                         'roles' => ['admin'],
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
     * Lists all Image models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        if (!Portfolio::find()->where(['id' => $id])->exists()) {
            throw new NotFoundHttpException();
        }

        $form = new MultipleUploadForm();

        $searchModel = new ImageSearch();
        $searchModel->portfolio_id = $id;

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if (Yii::$app->request->isPost) {
            $form->files = UploadedFile::getInstances($form, 'files');

            if ($form->files && $form->validate()) {
                foreach ($form->files as $file) {
                    $image = new Image();
                    $image->portfolio_id = $id;
                    if ($image->save()) {
                        $file->saveAs($image->getPath());
                    }
                }

            }
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'uploadForm' => $form,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->portfolio_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Image model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */

    /**
     * Deletes an existing Image model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $image = $this->findModel($id);
        $portfolio_id = $image->portfolio_id;
        $image->delete();

        return $this->redirect(['index', 'id' => $portfolio_id]);
    }



    /**
     * Finds the Image model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Image the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Image::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
