<?php


namespace Helper\Core;


use Helper\Constants\Errors;
use Throwable;

class NotSupportedException extends UserFriendlyException
{
    public function __construct(string $message = Errors::ACTION_NOT_SUPPORTED, int $code = 400, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}