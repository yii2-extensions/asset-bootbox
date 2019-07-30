<?php

/**
 * Web application configuration shared by all test types
 */

$config = [
    'id' => 'testme-asset-bootbox',
    'aliases' => [
        '@bower'   => '@root/node_modules',
        '@npm'   => '@root/node_modules',
        '@public' => '@root/tests/public',
        '@runtime' => '@root/tests/public/@runtime',
    ],
    'basePath' => '@root/src',
    'bootstrap' => ['log'],
    'components' => [
        'assetManager' => [
            'appendTimestamp' => true,
            'basePath' => '@public/assets',
            'forceCopy' => true,
        ],
        'log' => [
            'traceLevel' => 'YII_DEBUG' ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning', 'info'],
                    'logFile' => '@runtime/logs/app.log',
                ],
            ],
        ],
        'request' => [
            'cookieValidationKey' => 'testme-asset-floatlabels',
            'enableCsrfValidation' => true,
        ],
    ],
];

return $config;
