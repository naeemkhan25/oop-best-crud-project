<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit71611a25d6023ace3c049889b6bcd6c3
{
    public static $files = array (
        'e5611e8256f9c365ff3598853bb1ecc9' => __DIR__ . '/../..' . '/includes/Functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'w' => 
        array (
            'wedevs\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'wedevs\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit71611a25d6023ace3c049889b6bcd6c3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit71611a25d6023ace3c049889b6bcd6c3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit71611a25d6023ace3c049889b6bcd6c3::$classMap;

        }, null, ClassLoader::class);
    }
}