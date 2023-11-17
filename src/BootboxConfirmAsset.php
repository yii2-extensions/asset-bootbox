<?php

declare(strict_types=1);

namespace Yii2\Asset;

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
    public $depends = [
        BootstrapAsset::class,
        BootstrapPluginAsset::class,
        YiiAsset::class,
    ];

    public function init(): void
    {
        parent::init();

        $assetBootboxConfirm = match (YII_ENV === 'prod') {
            true => 'bootbox-confirm.min.js',
            default => 'bootbox-confirm.js',
        };

        $this->js[] = $assetBootboxConfirm;
        $this->publishOptions['only'] = [$assetBootboxConfirm];
    }
}
