<?php


namespace Helper\Core;


class Environment
{
    public const PRODUCTION  = 'PRODUCTION';
    public const DEVELOPMENT = 'DEVELOPMENT';
    public const STAGING     = 'STAGING';

    public static function current(): String
    {
        if (self::isStaging()) {
            return self::STAGING;
        } elseif (self::isProduction()) {
            return self::PRODUCTION;
        }
        return self::DEVELOPMENT;
    }

    public static function isStaging(): string
    {
        return static::is(self::STAGING);
    }

    public static function is(string $environment): bool
    {
        return static::compare(app()->environment(), $environment);
    }

    public static function compare(String $a, String $b): bool
    {
        return strcasecmp($a, $b) == 0;
    }

    public static function isProduction(): bool
    {
        return static::is(self::PRODUCTION);
    }

    public static function shouldDiscloseErrors(): bool
    {
        return static::isDevelopment();
    }

    public static function isDevelopment(): bool
    {
        return static::is(self::DEVELOPMENT);
    }
}