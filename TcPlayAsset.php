<?php
namespace xutl\tcplayer;

use yii\web\View;

/**
 * Asset bundle for TcPlayAsset Widget
 */
class TcPlayAsset extends \yii\web\AssetBundle
{
    public $css = [
        '//g.alicdn.com/de/prismplayer/1.6.3/skins/default/index-min.css',
    ];

    public $js = [
        '//imgcache.qq.com/open/qcloud/video/vcplayer/TcPlayer-2.2.0.js',
    ];

//    public $depends = [
//        'xutl\tcplayer\Es5Asset',
//    ];
}