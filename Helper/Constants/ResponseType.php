<?php


namespace Helper\Constants;


class ResponseType extends Holder
{
    public const OK                    = 200;
    public const CREATED               = 201;
    public const NO_CONTENT            = 204;
    public const BAD_REQUEST           = 400;
    public const NOT_AUTHORIZED        = 401;
    public const FORBIDDEN             = 403;
    public const NOT_FOUND             = 404;
    public const METHOD_NOT_ALLOWED    = 405;
    public const CONFLICT              = 409;
    public const UNPROCESSABLE_ENTITY  = 422;
    public const INTERNAL_SERVER_ERROR = 500;
    public const SERVICE_UNAVAILABLE   = 503;
}
