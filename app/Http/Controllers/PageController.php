<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function contact(){
        return view('public.pages.contact-us');
    }
}
