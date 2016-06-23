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

/**
 * PortfolioController implements the CRUD actions for Portfolio model.
 */
class MapController extends Controller
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
    public function actionMap($id)
    {
        //var_dump($mycastom_id);die();
        //if id li(id) = 0. select all
        //var_dump($id);die();
         session_start();
        if($id == 0){
            $_SESSION['we'] = $id;
            $model = Portfolio::find()->where(['status' => 'publichen'])
            ->orderBy('rating DESC')
            ->all();
            return $this->renderAjax('map', [
            'model' => $model,   
        ]);
            

        } elseif($id <= 9) {   
            
            //sampling of id = coordinate_id
            $model = Portfolio::find()
            ->joinWith('coordenats')
            ->where(['coordinates.category_map' => $id, 'status' => 'publichen'])
            ->orderBy('rating DESC')
            ->all();
            $_SESSION['we']=$id;
            
            return $this->renderAjax('map', [
            'model' => $model,
        ]);

        } elseif($id >= 10) {
            if($_SESSION['we'] == 0) {
                 $model = Portfolio::find()
                ->joinWith('coordenats')
                ->where(['coordinates.category_we' => $id, 'portfolio.status' => 'publichen'])
                ->orderBy('rating DESC')
                ->all();
                 return $this->renderAjax('map_1', [
                'model' => $model,
        ]);
            }
            //var_dump($_SESSION['test'], $id);die();
             $model = Portfolio::find()
            ->joinWith('coordenats')
            ->where(['coordinates.category_map' => $_SESSION['we'], 'coordinates.category_we' => $id, 'portfolio.status' => 'publichen'])
            ->orderBy('rating DESC')
            ->all();
             
             return $this->renderAjax('map_1', [
            'model' => $model,
        ]);

        }
        
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
