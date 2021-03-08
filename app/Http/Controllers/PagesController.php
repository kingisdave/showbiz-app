<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function welcome()
    {
        return view("pages.welcome");
    }
    public function contact()
    {
        return view("pages.welcome");
    }
    public function services()
    {
        return view("pages.welcome");
    }
    public function shops()
    {
        return view('pages.ecommerce');
    }
}
