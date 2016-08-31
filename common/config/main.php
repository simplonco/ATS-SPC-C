<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
      'user' => [
            'identityClass' => 'common\models\admin',
            'enableAutoLogin' => true,
            'identityCookie' => [
                'name' => '_backendUser', // unique for backend
            ]
        ],
        'session' => [
            'name' => 'PHPBACKSESSID',
            'savePath' => sys_get_temp_dir(),
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '[6947781049
1285622441
3733665669
7521587403
0929232946
8636104925
1816134028
1139170426
0538962443
1708431654]',
            'csrfParam' => '_backendCSRF',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
