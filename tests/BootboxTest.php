<?php

declare(strict_types=1);

namespace Yii2\Asset\Tests;

use Yii2\Asset\BootboxAsset;
use Yii2\Asset\BootboxConfirmAsset;
use Yii;
use yii\bootstrap5\BootstrapAsset;
use yii\bootstrap5\BootstrapPluginAsset;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;
use yii\web\View;
use yii\web\YiiAsset;

final class BootboxTest extends TestCase
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

    public function testBootboxSourcesPublish(): void
    {
        $view = new View();
        $bundle = BootboxAsset::register($view);

        $this->assertDirectoryExists($bundle->basePath);
        $this->sourcesPublishVerifyFiles('js', $bundle);
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

        $this->assertMatchesRegularExpression('/jquery.js/', $result);
        $this->assertMatchesRegularExpression('/yii.js/', $result);
        $this->assertMatchesRegularExpression('/bootbox-confirm.js/', $result);
        $this->assertMatchesRegularExpression('/bootbox.js/', $result);
    }

    private function sourcesPublishVerifyFiles(string $type, object $bundle): void
    {
        foreach ($bundle->$type as $filename) {
            $publishedFile = $bundle->basePath . DIRECTORY_SEPARATOR . $filename;
            $sourceFile = $bundle->sourcePath . DIRECTORY_SEPARATOR . $filename;
            $this->assertFileExists($publishedFile);
            $this->assertFileEquals($publishedFile, $sourceFile);
        }

        $this->assertDirectoryExists($bundle->basePath);
    }
}
