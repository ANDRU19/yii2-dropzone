<?php

namespace andru\dropzone;

use yii\web\AssetBundle;

class DropZoneAsset extends AssetBundle
{
    public $sourcePath = '@bower/dropzone/dist';
    public $css = [
        'dropzone.css',
    ];

    public $js = [
        'min/dropzone.min.js',
    ];
}
