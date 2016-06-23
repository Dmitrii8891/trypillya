<?php

namespace backend\controllers;

use Yii;
use common\models\Seo;
use backend\models\Seo as SeoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * SeoController implements the CRUD actions for Seo model.
 */
class SeoController extends Controller
{
//    public function behaviors()
//     {
//         return [
//             'access' => [
//                 'class' => AccessControl::className(),
//                 'rules' => [
//                     [
//                         'actions' => ['login', 'error'],
//                         'allow' => true,
//                         'roles' => ['@'],
//                     ],
//                     [
//                         'actions' => ['index', 'view', 'create', 'update', 'delete', 'portfolio', 'profile'],
//                         'allow' => true,
//                         'roles' => ['@'],
//                     ],
//                     [
//                         'actions' => ['index', 'view'],
//                         'allow' => true,
//                     ],
//                 ],
//             ],
//             'verbs' => [
//                 'class' => VerbFilter::className(),
//                 'actions' => [
//                     'logout' => ['post'],
//                 ],
//             ],
//         ];
//     }

    public function beforeAction($action) {
        $this->enableCsrfValidation = ($action->id !== ['update', 'create']); 
        return parent::beforeAction($action);
    }

    /**
     * Lists all Seo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SeoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Seo model.
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
     * Creates a new Seo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate_about($id)
    {
        
        
        $seo = Seo::find()->where(['about_id' => $id])->one();
        if($seo == null)
        {
            $model = new Seo();
            if ($model->load(Yii::$app->request->post())) {
                
                $model->about_id = $id;
                $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        } else {
            $model = Seo::find()->where(['about_id' => $id])->one();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }

        
    }
    
    public function actionCreate_portfolio($id)
    {
        
        
        $seo = Seo::find()->where(['portfolio_id' => $id])->one();
        if($seo == null)
        {
            $model = new Seo();
            if ($model->load(Yii::$app->request->post())) {
                
                $model->portfolio_id = $id;
                $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        } else {
            $model = Seo::find()->where(['portfolio_id' => $id])->one();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }

        
    }

    public function actionCreate_service($id)
    {
        
        
        $seo = Seo::find()->where(['services_id' => $id])->one();
        if($seo == null)
        {
            $model = new Seo();
            if ($model->load(Yii::$app->request->post())) {
                
                $model->services_id = $id;
                $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        } else {
            $model = Seo::find()->where(['services_id' => $id])->one();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }

        
    }
    
    public function actionCreate_index($id)
    {
        
        
        $seo = Seo::find()->where(['about_id' => $id])->one();
        if($seo == null)
        {
            $model = new Seo();
            if ($model->load(Yii::$app->request->post())) {
                
                $model->portfolio_id = $id;
                $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        } else {
            $model = Seo::find()->where(['id' => $id])->one();

            if ($model->load(Yii::$app->request->post())) {
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }

        
    }

    /**
     * Updates an existing Seo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->validate() && $model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Seo model.
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
     * Finds the Seo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Seo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Seo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
