<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Achievements */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Achievements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="achievements-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'nomber1',
            'title1',
            'nomber2',
            'title2',
            'nomber3',
            'title3',
            'nomber4',
            'title4',
            //'image1',
            'name1',
            'description1:ntext',
            //'image2',
            'name2',
            'description2:ntext',
            //'image3',
            'name3',
            'description3:ntext',
            //'status',
        ],
    ]) ?>

</div>
