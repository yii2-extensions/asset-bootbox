<?php

namespace terabytesoft\assets\tests;

use terabytesoft\assets\BootBoxAsset;
use terabytesoft\assets\YiiBootBoxAsset;
use terabytesoft\assets\tests\UnitTester;
use yii\bootstrap4\BootstrapAsset;
use yii\bootstrap4\BootstrapPluginAsset;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;
use yii\web\View;
use yii\web\YiiAsset;

/**
 * Class BootBoxCest
 *
 * unit tests for codeception
 */
class BootBoxCest
{
    /**
     * @var \yii\web\View;
     */
    private $view;

    /**
     * _before
     */
    public function _before(UnitTester $I)
    {
        $this->view = new View();
    }

    /**
     * bootBoxSimpleDependency
     */
    public function bootBoxSimpleDependency(UnitTester $I): void
    {

        $I->assertEmpty($this->view->assetBundles);

        BootBoxAsset::register($this->view);

        $I->assertCount(6, $this->view->assetBundles);
        $I->assertArrayHasKey(BootBoxAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(YiiBootBoxAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(BootstrapAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(BootstrapPluginAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(JqueryAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(YiiAsset::class, $this->view->assetBundles);
        $I->assertInstanceOf(AssetBundle::class, $this->view->assetBundles[BootBoxAsset::class]);
        $I->assertInstanceOf(AssetBundle::class, $this->view->assetBundles[YiiBootBoxAsset::class]);
        $I->assertInstanceOf(AssetBundle::class, $this->view->assetBundles[BootstrapAsset::class]);
        $I->assertInstanceOf(AssetBundle::class, $this->view->assetBundles[BootstrapPluginAsset::class]);
        $I->assertInstanceOf(AssetBundle::class, $this->view->assetBundles[JqueryAsset::class]);
        $I->assertInstanceOf(AssetBundle::class, $this->view->assetBundles[YiiAsset::class]);
    }

    /**
     * bootBoxSourcesPublish
     */
    public function bootBoxSourcesPublish(UnitTester $I): void
    {
        $bundle = BootBoxAsset::register($this->view);
        $I->assertTrue(is_dir($bundle->basePath));
        $this->sourcesPublishVerifyFiles('js', $bundle);
    }

    /**
     * bootBoxRegister
     */
    public function bootBoxRegister(UnitTester $I): void
    {
        $I->assertEmpty($this->view->assetBundles);

        BootBoxAsset::register($this->view);

        $I->assertCount(6, $this->view->assetBundles);
        $I->assertArrayHasKey(BootBoxAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(YiiBootBoxAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(BootstrapAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(BootstrapPluginAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(JqueryAsset::class, $this->view->assetBundles);
        $I->assertArrayHasKey(YiiAsset::class, $this->view->assetBundles);

        $result = $this->view->renderFile(codecept_data_dir() . 'main.php');

        $I->assertRegexp('/bootstrap.css/', $result);
        $I->assertRegexp('/jquery.js/', $result);
        $I->assertRegexp('/bootstrap.bundle.js/', $result);
        $I->assertRegexp('/yii.js/', $result);
        $I->assertRegexp('/YiiBootBox.js/', $result);
        $I->assertRegexp('/bootbox.js/', $result);
    }

    /**
     * sourcesPublishVerifyFiles
     */
    private function sourcesPublishVerifyFiles(string $type, object $bundle): void
    {
        foreach ($bundle->$type as $filename) {
            $publishedFile = $bundle->basePath . DIRECTORY_SEPARATOR . $filename;
            $sourceFile = $bundle->sourcePath . DIRECTORY_SEPARATOR . $filename;
            \PHPUnit_Framework_Assert::assertFileExists($publishedFile);
            \PHPUnit_Framework_Assert::assertFileEquals($publishedFile, $sourceFile);
        }
        \PHPUnit_Framework_Assert::assertTrue(is_dir($bundle->basePath));
    }
}
