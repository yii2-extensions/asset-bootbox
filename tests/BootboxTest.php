<?php

declare(strict_types=1);

namespace yii\extensions\assets\tests;

use Yii;
use yii\assets\BootboxAsset;
use yii\assets\BootboxConfirmAsset;
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

        $this->assertCount(4, $view->assetBundles);
        $this->assertArrayHasKey(BootboxAsset::class, $view->assetBundles);
        $this->assertArrayHasKey(BootboxConfirmAsset::class, $view->assetBundles);
        $this->assertArrayHasKey(YiiAsset::class, $view->assetBundles);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles[BootboxAsset::class]);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles[BootboxConfirmAsset::class]);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles[JqueryAsset::class]);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles[YiiAsset::class]);
    }

    public function testBootboxSourcesPublish(): void
    {
        $view = new View();
        $bundle = BootboxAsset::register($view);

        $this->assertTrue(is_dir($bundle->basePath));
        $this->sourcesPublishVerifyFiles('js', $bundle);
    }

    public function testBootboxRegister(): void
    {
        $view = new View();

        $this->assertEmpty($view->assetBundles);

        BootboxAsset::register($view);

        $this->assertCount(4, $view->assetBundles);
        $this->assertArrayHasKey(BootboxAsset::class, $view->assetBundles);
        $this->assertArrayHasKey(BootboxConfirmAsset::class, $view->assetBundles);
        $this->assertArrayHasKey(YiiAsset::class, $view->assetBundles);

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

        $this->assertTrue(is_dir($bundle->basePath));
    }
}
