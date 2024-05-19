<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function page404()
    {
        return view('page.page404');
    }
}
