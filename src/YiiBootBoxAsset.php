<?php

/**
 * @link https://github.com/terabytesoftw
 * @copyright Copyright (c) 2018 TerabyteSoft S.A.
 * @license https://github.com/terabytesoftw/asset-bootbox/blob/master/LICENSE.md
 *
 * @author: Wilmer Arámbula <wilmer.arambula@gmail.com>
 */

namespace terabytesoft\assets;

use yii\web\AssetBundle;

/**
 * Class YiiBootBoxAsset.
 *
 * Register simple js funtion yii bootbox
 **/
class YiiBootBoxAsset extends AssetBundle
{
    /**
     * @var array $depends
     */
    public $depends = [
        \yii\web\YiiAsset::class,
        \yii\bootstrap4\BootstrapAsset::class,
        \yii\bootstrap4\BootstrapPluginAsset::class,
    ];

    /**
     * @var array $js
     */
    public $js = [
        'YiiBootBox.js',
    ];

    /**
     * @var array $publishOptions
     */
    public $publishOptions = [
        'only' => [
            'YiiBootBox.js',
        ],
    ];

    /**
     * @var string $sourcePath
     */
    public $sourcePath = __DIR__ . '/js';

    /**
     * init
     */
    public function init(): void
    {
        parent::init();
    }
}
