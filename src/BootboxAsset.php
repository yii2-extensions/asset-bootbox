<?php

declare(strict_types=1);

namespace yii\assets;

use yii\web\AssetBundle;

final class BootboxAsset extends AssetBundle
{
    /**
     * @inheritDoc
     */
    public $sourcePath = '@npm/bootbox/dist';

    /**
     * @inheritDoc
     */
    public $js = [
        'bootbox.js',
    ];

    /**
     * @inheritDoc
     */
    public $publishOptions = [
        'only' => [
            'bootbox.js',
        ],
    ];

    /**
     * @inheritDoc
     */
    public $depends = [
        BootboxConfirmAsset::class,
    ];
}
