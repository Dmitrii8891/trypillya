<?php
use developeruz\db_rbac\behaviors\AccessBehavior;
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
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
        'assetManager' => [
            'basePath' => '@webroot/assets',
            'baseUrl' => '@web/assets',
            'bundles' => [
                'yii\web\JqueryAsset' => [
            'js'=>[]
        ],
    ],
        ],
        'request'=>[

        'class' => 'common\components\Request',

           'web'=> '/frontend/web'

        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'portfolio' => 'portfolio/portfolio',
                'service' => 'service/index',
                'portfolio/<id:\d+>' => 'portfolio/portfolio_detail',
                'portfolio/<slug:[a-zA-Z0-9\-_]*>' => 'portfolio/portfolio_detail',
                'service/<id:\d+>' => 'service/view',
                'service/<slug:[a-zA-Z0-9\-_]*>' => 'service/view',

            ]
        ],
    ],
    'params' => $params,
];
