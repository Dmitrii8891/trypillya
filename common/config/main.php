<?php
use developeruz\db_rbac\behaviors\AccessBehavior;
ini_set("session.save_path", $_SERVER['DOCUMENT_ROOT'].'/sessions');
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'ru',
    // 'as AccessBehavior' => [
    //     'class' => AccessBehavior::className(),
    //     ],
    'modules' => [
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
            
        ],

        'authManager' => [
          'class' => 'yii\rbac\DbManager',
        ],
        
    ],
];
