<?php

declare(strict_types=1);

namespace yii\extensions\bootbox\tests;

use Yii;
use yii\di\Container;
use yii\web\Application;

/**
 * This is the base class for all yii framework unit tests.
 */
abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    protected function destroyApplication()
    {
        Yii::$app = null;
        Yii::$container = new Container();
    }

    protected function mockWebApplication(): void
    {
        new Application(
            [
                'id' => 'testapp',
                'aliases' => [
                    '@app' => dirname(__DIR__),
                    '@bower' => '@app/node_modules',
                    '@npm' => '@app/node_modules',
                    '@public' => '@app/public',
                    '@vendor' => '@app/vendor',
                    '@web' => __DIR__ . '/runtime',
                ],
                'basePath' => dirname(__DIR__),
                'vendorPath' => dirname(__DIR__) . '/vendor',
                'components' => [
                    'assetManager' => [
                        'basePath' => __DIR__ . '/runtime',
                    ],
                    'request' => [
                        'cookieValidationKey' => 'wefJDF8sfdsfSDefwqdxj9oq',
                        'scriptFile' => __DIR__ . '/index.php',
                        'scriptUrl' => '/index.php',
                    ],
                ],
            ],
        );
    }

    protected function setup(): void
    {
        parent::setUp();
        $this->mockWebApplication();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->destroyApplication();
    }
}
