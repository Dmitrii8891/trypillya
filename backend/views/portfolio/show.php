<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PortfolioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Портфолио';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portfolio-index">

    <h1><?= Html::encode($this->title) ?> пользователя &nbsp<?= $user->username ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="col-md-12">
    <?php foreach($portfolio as $key): ?>
    	<div class="col md-6">
    	<h1><?= $key->title; ?></h1><br />
    		 <?= Html::a('Обновить',['/portfolio/update', 'id' =>$key->id ]) ?>
    	</div>
    	<?php endforeach; ?>
    </div>

</div>
