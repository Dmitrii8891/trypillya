<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Portfolio */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Портфолио', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portfolio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверенны что хотите удалить порфолио?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'image1',
            'object',
            //'location',
             'area',
            // 'client',
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
            // 'user_id',
            // 'status',
            // 'rating',
        ],
    ]) ?>

</div>
