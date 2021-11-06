<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function about()
    {
        return view('frontend.about');
    }
    
    public function faq()
    {
        return view('frontend.faq');
    }
    
    public function blog()
    {
        return view('frontend.blog');
    }
    
    public function contact ()
    {
        return view('frontend.contact');
    }
    
    public function privacyPolicy ()
    {
        return view('frontend.privacyPolicy');
    }
}
