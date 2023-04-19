<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/vendors/bootstrap.min.css',
		'css/vendors/animate.css',
		'css/vendors/swiper-bundle.min.css',
		'css/vendors/flaticon/flaticon.css',
		'css/vendors/all.min.css',
		'css/vendors/bootstrap-icons-1.9.1/bootstrap-icons.css',
		'css/vendors/jquery.fancybox.min.css',
//		'https://fonts.googleapis.com',
//		'https://fonts.gstatic.com',
//		'https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700;800&amp;display=swap',
		'css/main-LTR.css'
    ];
    public $js = [
		'js/vendors/jquery-3.6.1.min.js',
		'js/vendors/appear.min.js',
		'js/vendors/bootstrap.bundle.min.js',
		'js/vendors/jquery.countTo.js',
		'js/vendors/wow.min.js',
		'js/vendors/swiper-bundle.min.js',
		'js/vendors/particles.min.js',
		'js/vendors/vanilla-tilt.min.js',
		'js/vendors/isotope-min.js',
		'js/vendors/jquery.fancybox.min.js',
		'js/assaa.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
