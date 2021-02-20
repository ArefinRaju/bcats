<?php


namespace Helper\Constants;


use MyCLabs\Enum\Enum;

class JWTTokenStatus extends Enum
{
    public const OK      = 'OK';
    public const EXPIRED = 'EXPIRED';
    public const INVALID = 'INVALID';
}