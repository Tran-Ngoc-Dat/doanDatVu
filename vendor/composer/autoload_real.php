<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit0635e80d2be6ee1d83e3e57dc2629290
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

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit0635e80d2be6ee1d83e3e57dc2629290', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit0635e80d2be6ee1d83e3e57dc2629290', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit0635e80d2be6ee1d83e3e57dc2629290::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
