<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ServicesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Услуги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            //'image',
            [
                'format' => 'raw',
                'headerOptions' => ['width' => '80'],
                'value' => function ($model, $key, $index, $column) {
                    /** @var $model common\models\Image */
                    return Html::img($model->image, [
                        'style' => 'width:200px;'
                        ]);
                }
            ],
            //'text:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{images} <br /> {view} {update} {delete}',
                'buttons' => [
                    'images' => function ($url, $model, $key) {
                         return Html::a('SEO', Url::to(['seo/create_service', 'id' => $model->id]));
                    }
                ],
            ],
        ],
    ]); ?>

</div>
