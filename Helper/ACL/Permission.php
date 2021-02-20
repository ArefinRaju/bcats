<?php


namespace Helper\ACL;


use Helper\Constants\Holder;

class Permission extends Holder
{
    public const VIEW_RESOURCE            = 'VIEW_RESOURCE';
    public const USE_RESOURCE             = 'USE_RESOURCE';
    public const VIEW_FUND                = 'VIEW_FUND';
    public const COLLECT_FUND             = 'COLLECT_FUND';
    public const ADD_RESOURCE             = 'ADD_RESOURCE';
    public const ADD_FUND                 = 'ADD_FUND';
    public const PAY_BILLS                = 'PAY_BILLS';
    public const UPDATE_PROJECT_USER_ROLE = 'UPDATE_PROJECT_USER_ROLE';
    public const CREATE_PROJECT_USER      = 'CREATE_PROJECT_USER';
    public const CREATE_PROJECT           = 'CREATE_PROJECT';
    public const CREATE_MANAGER           = 'CREATE_MANAGER';
}