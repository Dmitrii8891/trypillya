<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?= Html::csrfMetaTags() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'TRYPILLYA',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } elseif(Yii::$app->user->can('admin')) {
        
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'Пользователи', 'url' => ['/user/index']],
        [
            'label' => 'Главная страница',
            'items' => [
                 ['label' => 'О нас говорят', 'url' => ['/about/index']],
                 ['label' => 'Схема работ', 'url' => ['/work/index']],
                 ['label' => 'Достижения', 'url' => ['/achievements/index']],
            ],
        ],
        ['label' => 'Портфолио пользователей', 'url' => ['/portfolio/index']],
        ['label' => 'Услуги', 'url' => ['/services/index']],
        //['label' => 'Соц-сети', 'url' => ['/social/index']],
        ['label' => 'О нас', 'url' => ['/aboutas/index']],
        ['label' => 'Заявки', 'url' => ['/orders/index']],
        ['label' => 'Контакты', 'url' => ['/cntact/index']],
       //['label' => 'Роли', 'url' => ['/permit/access/role']],
       //['label' => 'Права доступа', 'url' => ['/permit/access/permission']],
            ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']]
    ];
    }elseif(!Yii::$app->user->can('admin')) {
         $menuItems = [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Мой профиль', 'url' => ['/cabinet/portfolio']],
            ['label' => 'Мое портфолио', 'url' => ['/cabinet/profile']],
            ['label' => 'Выйти (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']]
    ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; TRYPILLYA <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
