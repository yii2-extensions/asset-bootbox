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
        \PHPUnit_Framework_Assert::assertEmpty($this->view->assetBundles);

        BootBoxAsset::register($this->view);

        \PHPUnit_Framework_Assert::assertCount(6, $this->view->assetBundles);
        \PHPUnit_Framework_Assert::assertArrayHasKey(BootBoxAsset::class, $this->view->assetBundles);
        \PHPUnit_Framework_Assert::assertArrayHasKey(YiiBootBoxAsset::class, $this->view->assetBundles);
        \PHPUnit_Framework_Assert::assertArrayHasKey(BootstrapAsset::class, $this->view->assetBundles);
        \PHPUnit_Framework_Assert::assertArrayHasKey(BootstrapPluginAsset::class, $this->view->assetBundles);
        \PHPUnit_Framework_Assert::assertArrayHasKey(JqueryAsset::class, $this->view->assetBundles);
        \PHPUnit_Framework_Assert::assertArrayHasKey(YiiAsset::class, $this->view->assetBundles);
        \PHPUnit_Framework_Assert::assertInstanceOf(AssetBundle::class, $this->view->assetBundles[BootBoxAsset::class]);
        \PHPUnit_Framework_Assert::assertInstanceOf(AssetBundle::class, $this->view->assetBundles[YiiBootBoxAsset::class]);
        \PHPUnit_Framework_Assert::assertInstanceOf(AssetBundle::class, $this->view->assetBundles[BootstrapAsset::class]);
        \PHPUnit_Framework_Assert::assertInstanceOf(AssetBundle::class, $this->view->assetBundles[BootstrapPluginAsset::class]);
        \PHPUnit_Framework_Assert::assertInstanceOf(AssetBundle::class, $this->view->assetBundles[JqueryAsset::class]);
        \PHPUnit_Framework_Assert::assertInstanceOf(AssetBundle::class, $this->view->assetBundles[YiiAsset::class]);
    }

    /**
     * bootBoxSourcesPublish
     *
     * @param UnitTester $I
     * @return void
     */
    public function bootBoxSourcesPublish(UnitTester $I)
    {
        $bundle = BootBoxAsset::register($this->view);
        \PHPUnit_Framework_Assert::assertTrue(is_dir($bundle->basePath));
        $this->sourcesPublishVerifyFiles('js', $bundle);
    }

    /**
     * bootBoxRegister
     *
     * @param UnitTester $I
     * @return void
     */
    public function bootBoxRegister(UnitTester $I)
    {
        \PHPUnit_Framework_Assert::assertEmpty($this->view->assetBundles);

        BootBoxAsset::register($this->view);

        \PHPUnit_Framework_Assert::assertCount(6, $this->view->assetBundles);
        \PHPUnit_Framework_Assert::assertArrayHasKey(BootBoxAsset::class, $this->view->assetBundles);
        \PHPUnit_Framework_Assert::assertArrayHasKey(YiiBootBoxAsset::class, $this->view->assetBundles);
        \PHPUnit_Framework_Assert::assertArrayHasKey(BootstrapAsset::class, $this->view->assetBundles);
        \PHPUnit_Framework_Assert::assertArrayHasKey(BootstrapPluginAsset::class, $this->view->assetBundles);
        \PHPUnit_Framework_Assert::assertArrayHasKey(JqueryAsset::class, $this->view->assetBundles);
        \PHPUnit_Framework_Assert::assertArrayHasKey(YiiAsset::class, $this->view->assetBundles);

        $result = $this->view->renderFile(codecept_data_dir() . 'Main.php');

        \PHPUnit_Framework_Assert::assertRegexp('/bootstrap.css/', $result);
        \PHPUnit_Framework_Assert::assertRegexp('/jquery.js/', $result);
        \PHPUnit_Framework_Assert::assertRegexp('/bootstrap.bundle.js/', $result);
        \PHPUnit_Framework_Assert::assertRegexp('/yii.js/', $result);
        \PHPUnit_Framework_Assert::assertRegexp('/YiiBootBox.js/', $result);
        \PHPUnit_Framework_Assert::assertRegexp('/bootbox.js/', $result);
    }

    /**
     * sourcesPublishVerifyFiles
     *
     * @param string $type
     * @param array  $bundle
     * @return void
     */
    private function sourcesPublishVerifyFiles($type, $bundle)
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
