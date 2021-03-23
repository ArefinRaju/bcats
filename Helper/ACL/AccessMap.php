<?php


namespace Helper\ACL;


use Helper\Constants\Holder;

class AccessMap extends Holder
{
    public const EMPLOYEE       = [Permission::USE_RESOURCE, Permission::VIEW_RESOURCE];
    public const MEMBER         = [Permission::VIEW_RESOURCE, Permission::VIEW_FUND];
    public const FUND_COLLECTOR = [Permission::COLLECT_FUND, ...self::MEMBER];
    public const PROJECT_ADMIN  = [Permission::ADD_RESOURCE, Permission::ADD_FUND, Permission::PAY_BILLS, Permission::UPDATE_PROJECT_USER_ROLE, Permission::CREATE_PROJECT_USER, ...self::FUND_COLLECTOR];
    public const MANAGER        = [Permission::CREATE_PROJECT, Permission::CREATE_PROJECT_USER];
    public const ADMIN          = [Permission::CREATE_MANAGER, ...self::MANAGER];
}