<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AchievementsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Achievements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="achievements-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a('Create Achievements', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
//            'nomber1',
//            'title1',
//            'nomber2',
            // 'title2',
            // 'nomber3',
            // 'title3',
            // 'nomber4',
            // 'title4',
            // 'image1',
            // 'name1',
            // 'description1:ntext',
            // 'image2',
            // 'name2',
            // 'description2:ntext',
            // 'image3',
            // 'name3',
            // 'description3:ntext',
            // 'status',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {view}',
            ],
        ],
    ]); ?>

</div>
