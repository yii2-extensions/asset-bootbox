<?php

declare(strict_types=1);

namespace Yii2\Asset;

use yii\web\AssetBundle;

final class BootboxAsset extends AssetBundle
{
    /**
     * @inheritDoc
     */
    public $sourcePath = '@npm/bootbox/dist';

    /**
     * @inheritDoc
     *
     * @phpstan-var array<array-key, mixed>
     */
    public $depends = [
        BootboxConfirmAsset::class,
    ];

    public function init(): void
    {
        parent::init();

        $assetBootbox = YII_ENV === 'prod' ? 'bootbox.min.js' : 'bootbox.js';

        $this->js[] = $assetBootbox;
        $this->publishOptions['only'] = [$assetBootbox];
    }
}
