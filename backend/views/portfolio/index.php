<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PortfolioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Portfolios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portfolio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить новое портфолио', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            //'image1',
            'object',
            //'location',
            // 'area',
            // 'client',
            'name',
            // 'task',
            // 'city',
            // 'project_manadger',
            // 'team:ntext',
            // 'text1:ntext',
            // 'video:ntext',
            // 'text2:ntext',
            // 'image2',
            // 'description:ntext',
            // 'map:ntext',
             //'user_id',
             'status',
            // 'rating',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{images} <br /> {view} {update} {delete}',
                'buttons' => [
                    'images' => function ($url, $model, $key) {
                         return Html::a('SEO', Url::to(['seo/create_portfolio', 'id' => $model->id]));
                    }
                ],
            ],
        ],
    ]); ?>

</div>
