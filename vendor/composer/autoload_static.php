<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit905ed17a4ed94bc1a7f1ca0ea6d27dbd
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'AVXMAN\\CRM\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'AVXMAN\\CRM\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit905ed17a4ed94bc1a7f1ca0ea6d27dbd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit905ed17a4ed94bc1a7f1ca0ea6d27dbd::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}