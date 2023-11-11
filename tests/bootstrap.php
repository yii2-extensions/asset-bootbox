<?php

declare(strict_types=1);

$autoload = dirname(__DIR__) . '/vendor/autoload.php';
$yii2 = dirname(__DIR__) . '/vendor/yiisoft/yii2/Yii.php';

if (!is_file($autoload)) {
    die('You need to set up the project dependencies using Composer');
}

if (!is_file($yii2)) {
    die('You need to set up yii2 using composer');
}

require_once $autoload;
require_once $yii2;

Yii::setAlias('@root', dirname(__DIR__));
