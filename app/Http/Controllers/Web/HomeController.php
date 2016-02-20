<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests;
use Faker\Provider\Base;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
