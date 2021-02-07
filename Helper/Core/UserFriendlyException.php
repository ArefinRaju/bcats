<?php


namespace Helper\Core;

use Exception;
use Throwable;

class UserFriendlyException extends Exception
{
    public $data;

    public function __construct(string $message = '', int $code = 400, $data = null, Throwable $previous = null)
    {
        $this->data = $data;
        parent::__construct($message, $code, $previous);
    }

    public function getData()
    {
        return $this->data;
    }
}