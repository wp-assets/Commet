<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc06ed0fa30d8d7bdb3760f35acf1acb9
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'Extendify\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Extendify\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc06ed0fa30d8d7bdb3760f35acf1acb9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc06ed0fa30d8d7bdb3760f35acf1acb9::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
