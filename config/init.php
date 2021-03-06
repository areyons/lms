<?php

//DEFAULT GLOBAL CONST


define("DEBUG", true);                              // true-false dev mode

define("ROOT", dirname(__DIR__));              // root dir
define("WWW", ROOT . '/public');                    // public dir
define("APP", ROOT . '/app');                       // app dir
define("CORE", ROOT . '/vendor/lms/core');          // lms core dir
define("LIBS", ROOT . '/vendor/lms/core/libs');     // libs dir
define("CACHE", ROOT . '/tmp/cache');               // cache dir
define("CONFIG", ROOT . '/config');                 // config dir

define("TEMPLATE", 'default');                         // Default Theme

$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";         // http://yoursite.com/public/index.php
$app_path = preg_replace("#[^/]+$#", '', $app_path);       // http://yoursite.com/public/
$app_path = str_replace('/public/','',$app_path);              // http://yoursite.com

define("PATH", $app_path);                          // http://your_site.com

define("ADMIN", PATH . '/adm');                     // admin panel dir


//DEFAULT GLOBAL CONST


require_once ROOT . '/vendor/autoload.php';         // connecting composer autoload