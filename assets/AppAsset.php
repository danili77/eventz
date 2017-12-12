<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Asset generico de la aplicación.
 */
class AppAsset extends AssetBundle
{
    /**
     * @var string El directorio que contiene los archivos de este asset.
     */
    public $basePath = '@webroot';
    /**
     * @var string La url base para los archivos del asset.
     */
    public $baseUrl = '@web';
    /**
     * @var array Los archivos css del asset
     */
    public $css = [
        'css/site.css',
    ];
    /**
     * @var array Los archivos js del asset
     */
    public $js = [
        '/js/ventanaReproductor.js',
        '/js/dom.js'
    ];

    /**
     * @var array Las dependencias del asset.
     */
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
