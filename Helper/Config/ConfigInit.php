<?php


namespace Helper\Config;


class ConfigInit
{
    public static string $appName;
    /**
     * @var mixed
     */
    private static $_commonInitialized;

    // Laravel calls this when bootstrapping, please perform all initialization of config here.
    public static function init()
    {
        if (!self::$_commonInitialized) {
            JWTConfig::init();
            static::$appName = env('APP_NAME', 'bcats');
        }
    }
}