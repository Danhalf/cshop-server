<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitba7098bafe0a7163c3ad414f0de22c71
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'cvendor\\' => 8,
        ),
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'cvendor\\' => 
        array (
            0 => __DIR__ . '/..' . '/cvendor',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitba7098bafe0a7163c3ad414f0de22c71::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitba7098bafe0a7163c3ad414f0de22c71::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitba7098bafe0a7163c3ad414f0de22c71::$classMap;

        }, null, ClassLoader::class);
    }
}
