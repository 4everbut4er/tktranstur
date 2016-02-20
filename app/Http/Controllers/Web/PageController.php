<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests;
use Illuminate\Http\Request;

class PageController extends BaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function mainPage()
    {
        return view('page.main');
    }

    public function contactPage(){
        return view('page.contact');
    }
}
