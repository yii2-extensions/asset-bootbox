<?php

declare(strict_types=1);

namespace Yii2\Asset\Tests;

use Yii2\Asset\BootboxAsset;
use Yii2\Asset\BootboxConfirmAsset;
use Yii2\Asset\BootstrapAsset;
use Yii2\Asset\BootstrapPluginAsset;
use Yii;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;
use yii\web\View;
use yii\web\YiiAsset;

final class AssetTest extends TestCase
{
    public function testBootboxSimpleDependency(): void
    {
        $view = Yii::$app->getView();

        $this->assertEmpty($view->assetBundles);

        BootboxAsset::register($view);


        $this->assertCount(6, $view->assetBundles);
        $this->assertArrayHasKey(BootboxConfirmAsset::class, $view->assetBundles);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles[BootboxAsset::class]);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles[BootboxConfirmAsset::class]);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles[BootstrapAsset::class]);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles[BootstrapPluginAsset::class]);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles[JqueryAsset::class]);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles[YiiAsset::class]);
    }

    public function testBootboxRegister(): void
    {
        $view = new View();

        $this->assertEmpty($view->assetBundles);

        BootboxAsset::register($view);

        $this->assertCount(6, $view->assetBundles);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles[BootboxAsset::class]);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles[BootboxConfirmAsset::class]);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles[BootstrapAsset::class]);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles[BootstrapPluginAsset::class]);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles[JqueryAsset::class]);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles[YiiAsset::class]);

        $result = $view->renderFile(__DIR__ . '/support/main.php');

        $this->assertStringContainsString('jquery.js', $result);
        $this->assertStringContainsString('yii.js', $result);
        $this->assertStringContainsString('bootbox-confirm.js', $result);
        $this->assertStringContainsString('bootbox.js', $result);
    }
}
