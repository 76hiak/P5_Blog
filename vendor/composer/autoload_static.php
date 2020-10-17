<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit64e3f78c5896038c2d85752f953248b2
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'Views\\' => 6,
        ),
        'P' => 
        array (
            'Post\\' => 5,
        ),
        'M' => 
        array (
            'Manager\\' => 8,
        ),
        'E' => 
        array (
            'Entity\\' => 7,
        ),
        'C' => 
        array (
            'Controllers\\' => 12,
        ),
        'B' => 
        array (
            'Blog\\' => 5,
        ),
        'A' => 
        array (
            'Admin\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Views\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Views',
        ),
        'Post\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Models/Entity/Post',
        ),
        'Manager\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Models/Manager',
        ),
        'Entity\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Models/Entity',
        ),
        'Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Controllers',
        ),
        'Blog\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Blog',
        ),
        'Admin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Views/Admin',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit64e3f78c5896038c2d85752f953248b2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit64e3f78c5896038c2d85752f953248b2::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
