<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SocialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Socials';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="social-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Social', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            // /'id',
            'title',
            'link:ntext',
            'status',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
