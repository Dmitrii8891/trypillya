<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\models\Seo;
use yii\data\Pagination;
use common\models\Services;
use common\models\ImagesServices;
/**
 * PortfolioController implements the CRUD actions for Portfolio model.
 */
class ServiceController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Portfolio models.
     * @return mixed
     */
    public function actionIndex()
    {
        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => 'Услуги по проектированию и строительстве зданий. Проектная комманда №1 в Украине. Компания TRP'
        ]);
        $model = Services::find()
                ->where(['status' => 'published'])
                ->all();
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Portfolio model.
     * @param integer $id
     * @return mixed
     */
    public function actionView()
    {
        if(isset($_GET['slug'])) {
                 $id =  $_GET['slug'];
        } elseif (isset($_GET['id'])) {
                $id =  $_GET['id'];
            }


        if(!is_numeric($id)) {
            $seo2 = Seo::find()->where(['slug' => $id])->one();
            $model = Services::findOne($seo2->service->id);
            $seo = Services::findOne($seo2->service->id);
        } else {
            $model = Services::findOne($id);
            $seo = Services::findOne($id);
        }
        
        if(isset($seo->id) and $seo->seo->description != null){
            
            $description = $seo->seo->description;

            Yii::$app->view->registerMetaTag([
                        'name' => 'description',
                        'content' => $description,
                ]);
            
        }else{
            
            //$description = $model->text;

            Yii::$app->view->registerMetaTag([
                        'name' => 'description',
                        'content' => $model->title.'. '.'Проектная группа №1 в Украине. Trypillya.com',
                ]);
            
            }
            
         if(isset($seo->id) and $seo->seo->keywords != null){
            
             $keywords = $seo->seo->keywords;
            Yii::$app->view->registerMetaTag([
                        'name' => 'keywords',
                        'content' => $keywords,
                ]);
            
            
        }else{
            
            $keywords = $model->title;
            Yii::$app->view->registerMetaTag([
                        'name' => 'keywords',
                        'content' => $keywords,
                ]);
            
            }

        

        $imagesServices = ImagesServices::find()
                        ->where(['services_id' => $id])
                        ->all();

        return $this->render('view', [
            'model' => $model,
            'imagesServices' => $imagesServices,
            'seo' => $seo,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Services::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
