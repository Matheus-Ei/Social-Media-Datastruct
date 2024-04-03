<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6dbf24bebac58f965e773b1552bcf690
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Alexa\\TrabalhoAlgoritimos\\' => 26,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Alexa\\TrabalhoAlgoritimos\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6dbf24bebac58f965e773b1552bcf690::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6dbf24bebac58f965e773b1552bcf690::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6dbf24bebac58f965e773b1552bcf690::$classMap;

        }, null, ClassLoader::class);
    }
}
