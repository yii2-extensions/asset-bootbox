<?php

declare(strict_types=1);

namespace yii\bootbox;

use yii\bootstrap5\BootstrapAsset;
use yii\bootstrap5\BootstrapPluginAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

final class BootboxConfirmAsset extends AssetBundle
{
    /**
     * @inheritDoc
     */
    public $sourcePath = __DIR__ . '/js';

    /**
     * @inheritDoc
     */
    public $js = [
        'bootbox-confirm.js',
    ];

    /**
     * @inheritDoc
     */
    public $publishOptions = [
        'only' => [
            'bootbox-confirm.js',
        ],
    ];

    /**
     * @inheritDoc
     */
    public $depends = [
        BootstrapAsset::class,
        BootstrapPluginAsset::class,
        YiiAsset::class,
    ];

    public function init(): void
    {
        parent::init();
    }
}
