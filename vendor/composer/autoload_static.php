<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb55421aafcce73e27c115a91a5365a5c
{
    public static $prefixLengthsPsr4 = array (
        't' => 
        array (
            'twitter\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'twitter\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Model',
            1 => __DIR__ . '/../..' . '/Controller',
            2 => __DIR__ . '/../..' . '/View',
            3 => __DIR__ . '/../..' . '/View/Homepage',
            4 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb55421aafcce73e27c115a91a5365a5c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb55421aafcce73e27c115a91a5365a5c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb55421aafcce73e27c115a91a5365a5c::$classMap;

        }, null, ClassLoader::class);
    }
}