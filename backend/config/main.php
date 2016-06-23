<?php
use developeruz\db_rbac\behaviors\AccessBehavior;
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'permit' => [
                'class' => 'developeruz\db_rbac\Yii2DbRbac',
                'params' => [
                    'userClass' => 'common\models\User'
                ]
            ],
        'as AccessBehavior' => [
        'class' => AccessBehavior::className(),
        ],
        'yii2images' => [
            'class' => 'rico\yii2images\Module',
            //be sure, that permissions ok 
            //if you cant avoid permission errors you have to create "images" folder in web root manually and set 777 permissions
            'imagesStorePath' => '@frontend/images/store', //path to origin images
            'imagesCachePath' => '@frontend/images/cache', //path to resized copies
            'graphicsLibrary' => 'GD', //but really its better to use 'Imagick' 
            'placeHolderPath' => '@frontend/images/placeHolder.png', // if you want to get placeholder when image not exists, string will be processed by Yii::getAlias
        ],

    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'as AccessBehavior' => [
        'class' => AccessBehavior::className(),
        ],
        'authManager' => [
          'class' => 'yii\rbac\DbManager',
        ],
        
        'assetManager' => [
            'basePath' => '@webroot/assets',
            'baseUrl' => '@web/assets'
        ],
        'request'=>[

        'class' => 'common\components\Request',

           'web'=> '/frontend/web',
           'enableCsrfValidation' => false

        ],


        
    ],
    'params' => $params,
];
