<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit37a599da898c365cbbc7a92dee82a4bb
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit37a599da898c365cbbc7a92dee82a4bb', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit37a599da898c365cbbc7a92dee82a4bb', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit37a599da898c365cbbc7a92dee82a4bb::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}