<?php

/**
 * @link https://github.com/terabytesoftw
 * @copyright Copyright (c) 2018 TerabyteSoft S.A.
 * @license https://github.com/terabytesoft/asset-bootbox/blob/master/LICENSE.md
 *
 * @author: Wilmer Arámbula <wilmer.arambula@gmail.com>
 */

namespace terabytesoft\assets;

use yii\web\AssetBundle;

/**
 * Class BootBoxAsset.
 *
 * Register assset bundle widget bootbox
 */
class BootBoxAsset extends AssetBundle
{
    /**
     * @var array $depends
     */
    public $depends = [
        \terabytesoft\assets\YiiBootBoxAsset::class,
    ];

    /**
     * @var array $js
     */
    public $js = [
        'bootbox.js',
    ];

    /**
     * @var array $publishOptions
     */
    public $publishOptions = [
        'only' => [
            'bootbox.js',
        ],
    ];

    /**
     * @var string $sourcePath
     */
    public $sourcePath = '@npm/bootbox/src';

    /**
     * init
     */
    public function init(): void
    {
        parent::init();
    }
}
