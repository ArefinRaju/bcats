<?php


namespace Helper\Config;


class JWTConfig
{
    public static int    $idTokenExpiryInSeconds;
    public static int    $refreshTokenExpiryInSeconds;
    public static string $signingKey;
    public static string $refresh;
    public static string $userId;
    public static string $user;
    public static string $acl;

    public static function init()
    {
        self::$idTokenExpiryInSeconds      = env('JWT_TOKEN_EXPIRY_IN_SECONDS', 3600);
        self::$refreshTokenExpiryInSeconds = env('JWT_REFRESH_CLAIM_EXPIRY_IN_SECONDS', 7200);
        self::$signingKey                  = env('JWT_SIGNING_KEY', 'test'); // MD5 Encryption for now
        self::$refresh                     = 'refreshUntil';
        self::$userId                      = 'uid';
        self::$user                        = 'user';
        self::$acl                         = 'acl';
    }
}