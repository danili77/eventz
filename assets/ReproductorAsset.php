<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Asset para la vista del reproductor de musica.
 */
class ReproductorAsset extends AssetBundle
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
     * @var array Los archivos css del asset.
     */
    public $css = [
        '/js/player/css/styles.css',
        '/css/reproductor.css',
    ];
    /**
     * @var array Los archivos js del asset.
     */
    public $js = [
        //'/js/player/js/jquery-1.7.2.min.js',
        '/js/player/js/musicplayer-min.js',
        '/js/player/js/musicplayer.js',
        '/js/player.js',
    ];
    /**
     * @var array Las dependencias del asset.
     */
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\web\JqueryAsset',
    ];
}
