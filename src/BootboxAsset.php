<?php

declare(strict_types=1);

namespace yii\bootbox;

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
    public $publishOptions = [
        'only' => [
            'bootbox.js',
            'bootbox.min.js',
        ],
    ];

    /**
     * @inheritDoc
     */
    public $depends = [
        BootboxConfirmAsset::class,
    ];

    public function init(): void
    {
        parent::init();

        $this->js[] = YII_DEBUG ? 'bootbox.js' : 'bootbox.min.js';
    }
}
