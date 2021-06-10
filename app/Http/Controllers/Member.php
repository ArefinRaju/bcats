<?php

namespace App\Http\Controllers;

use Helper\Core\HelperController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Member extends HelperController
{
    public function index()
    {
        dd(Auth::user());
    }
}
