<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SearchUser */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить пользователя', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'last_name',
            'patronymic',
            //'image',
            // 'email:email',
            // 'country',
            // 'city',
            // 'addres',
            // 'phone',
            // 'skype',
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
            // 'status',
            // 'created_at',
            // 'updated_at',
            
            ['class' => 'yii\grid\ActionColumn',
             'template' => '{view}&nbsp;&nbsp;{update}&nbsp;&nbsp;{permit}&nbsp;&nbsp;{portfolio}&nbsp;&nbsp;{delete}',
             'buttons' =>
                 [
                     'permit' => function ($url, $model) {
                         return Html::a('<span class="glyphicon glyphicon-user"></span>', Url::to(['/permit/user/view', 'id' => $model->id]), [
                             'title' => Yii::t('yii', 'Назначить роль')
                         ]); },
                         'portfolio' => function ($url, $model) {
                         return Html::a('<span class="glyphicon glyphicon  glyphicon-briefcase"></span>', Url::to(['/portfolio/show', 'id' => $model->id]), [
                             'title' => Yii::t('yii', 'Просмотр портфолио')
                         ]); },
                 ]

            ],
        ],
    ]); ?>

</div>