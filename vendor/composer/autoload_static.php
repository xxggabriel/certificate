<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd4fced78f80318ca81578d6196a48fcd
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Certificate\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Certificate\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd4fced78f80318ca81578d6196a48fcd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd4fced78f80318ca81578d6196a48fcd::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
