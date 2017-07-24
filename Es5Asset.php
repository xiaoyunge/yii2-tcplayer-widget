<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace xutl\tcplayer;

use yii\web\AssetBundle;

/**
 * Asset bundle for TcPlayAsset Widget
 */
class Es5Asset extends AssetBundle
{

    public $js = [
        '//imgcache.qq.com/open/qcloud/video/vcplayer/libs/es5-shim.js',
        '//imgcache.qq.com/open/qcloud/video/vcplayer/libs/es5-sham.js'
    ];

    public $jsOptions = ['condition' => 'lte IE9'];
}