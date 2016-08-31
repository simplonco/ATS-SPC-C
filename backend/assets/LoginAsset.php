<?php

namespace backend\assets;
use yii\web\AssetBundle;

class LoginAsset extends AssetBundle
{
public $basePath = '@webroot';
public $baseUrl = '@web';
public $css = [
'css/bootstrap.min.css',
'//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awespme.min.css',
'css/AdminLTE.min.css',
'cass/blue.css',

];
public $js = [
'js/icheck.min.js',
];
public $depends = [
'yii\web\YiiAsset',
'yii\bootstrap\BootstrapAsset',
];
}
