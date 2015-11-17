<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/fancybox/jquery.fancybox.css',
        'css/jcarousel.css',
        'css/flexslider.css',
        'css/style.css',
        'skins/default.css',
    ];
    public $js = [
        'js/jquery.easing.1.3.js',
        'js/jquery.fancybox.pack.js',
        'js/google-code-prettify/prettify.js',
        'js/portfolio/jquery.quicksand.js',
        'js/portfolio/setting.js',
        'js/jquery.flexslider.js',
        'js/animate.js',
        'js/custom.js',
        'js/jquery.fancybox-media.js',

    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}