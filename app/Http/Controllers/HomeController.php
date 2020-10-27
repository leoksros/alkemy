<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $apps = Application::where('status','=','enable')->get();
        $title = 'Applications';
        return view('home',compact('apps','title'));
    }
}
