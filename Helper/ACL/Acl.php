<?php


namespace Helper\ACL;


use Illuminate\Http\Request;

class Acl
{
    public static function authorize(Request $request)
    {

    }

    public static function getUser(Request $request): object
    {
        return (object)$request->user();
    }
}