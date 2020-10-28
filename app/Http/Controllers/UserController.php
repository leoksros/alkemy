<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase;
use App\Application;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function buyed_app($idApp)
    {

        foreach(Auth::user()->apps as $app)
        {
            if ($app->id == $idApp)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
       
    }

    public function my_apps()
    {

        $purchases = Purchase::where('user_id','=', Auth::user()->id)->get();
        $apps = [];
        
        foreach($purchases as $purchase)
        {
            $apps[] = $purchase->app;
        }      

        $title = "My applications";
        return view('home',compact('apps','title'));                
        
    }


    public function crafted_apps()
    {
        $apps = Application::where('user_id','=', Auth::user()->id)->paginate(10);     

        $title = "My applications [Developer]";
        
        return view('home',compact('apps','title'));           
    }

    
}
