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
    public $sourcePath = '@npm/bootbox/src';

    public $js = [
        'bootbox.js',
    ];

    public $publishOptions = [
        'only' => [
            'bootbox.js',
        ],
    ];

    public $depends = [
        \terabytesoft\assets\YiiBootBoxAsset::class,
    ];
}
