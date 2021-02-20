<?php


namespace Helper\Constants;


class Errors extends Holder
{
    public const FORBIDDEN                      = 'FORBIDDEN';
    public const AUTHENTICATION_FAILED          = 'AUTHENTICATION_FAILED';
    public const AUTHENTICATION_TOKEN_MISSING   = 'AUTHENTICATION_TOKEN_MISSING';
    public const AUTHENTICATION_TOKEN_MALFORMED = 'AUTHENTICATION_TOKEN_MALFORMED';
    public const UNAUTHORIZED                   = 'UNAUTHORIZED';
    public const AUTHENTICATION_TOKEN_EXPIRED   = 'AUTHENTICATION_TOKEN_EXPIRED';
    public const AUTHENTICATION_TOKEN_INVALID   = 'AUTHENTICATION_TOKEN_INVALID';
    public const ACTION_NOT_SUPPORTED           = 'ACTION_NOT_SUPPORTED';
}
