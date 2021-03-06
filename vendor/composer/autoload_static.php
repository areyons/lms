<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdf974024857cf66e0b146f39a924de7c
{
    public static $prefixLengthsPsr4 = array (
        'l' => 
        array (
            'lms\\' => 4,
        ),
        'a' => 
        array (
            'app\\' => 4,
        ),
        'R' => 
        array (
            'RedBeanPHP\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'lms\\' => 
        array (
            0 => __DIR__ . '/..' . '/lms/core',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'RedBeanPHP\\' => 
        array (
            0 => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdf974024857cf66e0b146f39a924de7c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdf974024857cf66e0b146f39a924de7c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdf974024857cf66e0b146f39a924de7c::$classMap;

        }, null, ClassLoader::class);
    }
}
