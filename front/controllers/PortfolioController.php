<?php

namespace frontend\controllers;

use Yii;
use common\models\Portfolio;
use backend\models\PortfolioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\models\Coordinates;
use common\models\User;
use common\models\Seo;
use yii\data\Pagination;
use common\models\ImagePortfolio;
/**
 * PortfolioController implements the CRUD actions for Portfolio model.
 */
class PortfolioController extends Controller
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
        //select all portfolio users and show
       
        $portfolio = Portfolio::find()
	        ->where(['user_id' => Yii::$app->user->identity->id])
	        ->orderBy('id')->all();

        return $this->render('index', [
            'portfolio' => $portfolio,
            //'user' => $user,
        ]);
    }

    public function actionTest()
    {
        $model = Model::find()->all();
    }

     public function actionPortfolio()
     {
         $country = new Coordinates();
         $model = Portfolio::find()
         ->joinWith('seo')
         ->where(['status' => 'publichen'])
         ->all();
         //проверяем уникальность страны перед выводом
         $country_un = Coordinates::find()->select('country')->distinct()->all();
         
         $count_all = Portfolio::find()->count();
         $count_1 = Coordinates::find()->where(['category_map' => 1])->count();
         $count_2 = Coordinates::find()->where(['category_map' => 2])->count();
         $count_3 = Coordinates::find()->where(['category_map' => 3])->count();
         $count_4 = Coordinates::find()->where(['category_map' => 4])->count();
         $count_5 = Coordinates::find()->where(['category_map' => 5])->count();
         $count_6 = Coordinates::find()->where(['category_map' => 6])->count();
         $count_7 = Coordinates::find()->where(['category_map' => 7])->count();
         $count_8 = Coordinates::find()->where(['category_map' => 8])->count();
         $count_9 = Coordinates::find()->where(['category_map' => 9])->count();
         
         $seo = Portfolio::find()
                ->joinWith('seo')
                ->one();

        if(isset($_GET['category_map'])) {
            if($_GET['category_map'] == 0){
             $model = Portfolio::find()
                ->joinWith('seo')
                ->where(['status' => 'publichen'])
                ->all();  
            } else {
                $category_map = $_GET['category_map'];
                $model = Portfolio::find()
                ->joinWith('coordenats')
                ->where(['coordinates.category_map' => $category_map, 'status' => 'publichen'])
                ->all();
            }
            
        } 
        if(isset($_GET['country'])){
            $id_country = $_GET['country'];
            $model = Portfolio::find()
            ->joinWith('coordenats')
            ->where(['status' => 'publichen', 'coordinates.country' => $id_country])
            ->all();
        }

    	return $this->render('portfolio_all', [
            'model' => $model,
            'country_un' => $country_un,
            'country' => $country,
            'count_all' => $count_all,
            'count_1' => $count_1,
            'count_2' => $count_2,
            'count_3' => $count_3,
            'count_4' => $count_4,
            'count_5' => $count_5,
            'count_6' => $count_6,
            'count_7' => $count_7,
            'count_8' => $count_8,
            'count_9' => $count_9
    	]);
     }


     public function actionPortfolio_detail()
     {  
             if(isset($_GET['slug'])) {
                 $id =  $_GET['slug'];
             }
             elseif (isset($_GET['id'])) {
                $id =  $_GET['id'];
            }
        $portfolio_image = ImagePortfolio::find()->where(['portfolio_id' => $id])->all();
        $portfolioall = Portfolio::find()
            ->where(['publication' => 1, 'status' => 'publichen'])
            ->orderBy('rating DESC')
            ->limit(10)
            ->all();
        
        if(!is_numeric($id)) {
            $seo2 = Seo::find()->where(['slug' => $id])->one();
            $model = Portfolio::find()->where(['id' =>$seo2->portfolio->id])->orderBy('rating DESC')->one();
            
        } else {
            $model = Portfolio::find()->where(['id' =>$id])->orderBy('rating DESC')->one();
        }
        
        $team = explode(",", $model->team);
        $seo = Portfolio::find()
                ->joinWith('seo')
                ->where(['seo.portfolio_id' => $id])
                ->one();
        
        if(isset($seo->id) and $model->seo->description != null){
            
            $description = $model->seo->description;

            Yii::$app->view->registerMetaTag([
                        'name' => 'description',
                        'content' => $description,
                ]);
            
        }else{
            //$description = $model->object;

            Yii::$app->view->registerMetaTag([
                        'name' => 'description',
                        'content' => $model->title.'. '.'Проектная группа №1 в Украине. Trypillya.com',
                ]);
            }
            
        if(isset($seo->id) and $model->seo->keywords != null){
            
            $keywords = $model->seo->keywords;

            Yii::$app->view->registerMetaTag([
                        'name' => 'keywords',
                        'content' => $keywords,
                ]);
            
        }else{
            $keywords = $model->task;
            Yii::$app->view->registerMetaTag([
                        'name' => 'keywords',
                        'content' => $keywords,
                ]);
            }
            return $this->render('portfolio_detail', [
                'model' => $model,
                'portfolioall' => $portfolioall,
                'portfolio_image' => $portfolio_image,
            ]);
        
        
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
        $model = new Portfolio();

        if ($model->load(Yii::$app->request->post())) {

            $model->user_id = Yii::$app->user->identity->id;

            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
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
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->file = UploadedFile::getInstances($model, 'file');

            if ($model->file) {
                foreach ($model->file as $key) {
                    $pat = Yii::getAlias('@webroot/images/'). $key->baseName . '.' . $key->extension;

                    $key->saveAs($pat);

                    $model->attachImage($pat);
                }
            }


            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Portfolio model.
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
