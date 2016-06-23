<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Aboutas */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aboutas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aboutas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a('Create Aboutas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'text:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{images} <br /> {update}',
                'buttons' => [
                    'images' => function ($url, $model, $key) {
                         return Html::a('SEO', Url::to(['seo/create_about', 'id' => $model->id]));
                    }
                ],
            ],
        ],
    ]); ?>

</div>
