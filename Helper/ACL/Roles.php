<?php


namespace Helper\ACL;


use Helper\Constants\Holder;

class Roles extends Holder
{
    public const ADMIN          = 'ADMIN';
    public const MANAGER        = 'MANAGER';
    public const PROJECT_ADMIN  = 'PROJECT_ADMIN';
    public const FUND_COLLECTOR = 'FUND_COLLECTOR';
    public const MEMBER         = 'MEMBER';
    public const EMPLOYEE       = 'EMPLOYEE';
}