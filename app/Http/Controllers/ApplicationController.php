<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Application;
use App\Category;
use App\AppPrice;
use App\Purchase;
use App\Wishlist;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $apps = Application::where('status','=','enable')->orderBy('created_at', 'desc')->paginate(10);
        
        $title = 'Applications';
        return view('home',compact('apps','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
       
        return view('apps.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'name' => "string|min:3",
            'price' => "numeric|min:0",
            'image' => "image"
        ];
        $messages = [
            'string' => "El campo :attribute debe ser un texto",
            'min' => "El campo :attribute tiene un minimo de :min",
            'max' => "El campo :attribute tiene un maximo de :max",
            'numeric' => "El campo :attribute debe ser un numero",
            'integer' => "El campo :attribute debe ser un numero entero",
            'unique' => "El campo :attribute se encuntra repetido",
            'image' => "El campo :attribute debe ser una imagen"
        ];

        $this->validate($request, $rules, $messages);

        $path = $request->file("image")->store("public");
        $img_name = basename($path);

        $app = new Application;        
        $app->name = $request->name;        
        $app->image = $img_name;
        $app->category_id = $request->category_id;
        $app->description = $request->description;
        $app->user_id = Auth::user()->id;
        $app->status = 'enable';
        $app->save();

        $price = new AppPrice;        
        $price->price = $request->price;
        $price->application_id = $app->id;
        $price->save();

        return redirect()->route('home')->with('status','Application created.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Application $app)
    {
       
        $idApp = $app->id;

        if (count(Auth::user()->buyedApps) != 0)
        {
            foreach(Auth::user()->buyedApps as $application)
            {                
                
                if ($application->application_id == $idApp)
                {
                    $buyed = 'true';
                  
                }
                else
                {
                    $buyed = 'false';
                 
                }
            }
        }
        else
        {
            $buyed = 'false';
        }
        
        if (count(Auth::user()->wishes) != 0)
        {
            foreach(Auth::user()->wishes as $wish)
            {
                
                if ($wish->application_id == $idApp)
                {
                    $wished = 'true';
                }
                else
                {
                    $wished = 'false';
                }
            }
        }
        else
        {
            $wished = 'false';
        }
               
        return view('apps.app',compact('app','buyed','wished'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($app)
    {
        $app = Application::find($app);

        return view('apps.edit',compact('app'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $app)
    {
       
        if(request()->file('image')){

            if($app->image){               
                    Storage::delete("public/".$app->image);                            
            }

            $path = $request->file("image")->store("public");
            $image = basename($path);
             
        }
        else
        {
            $image = $app->image;
        }

        if($app->price() != $request->price)
        {

            $price = new AppPrice;
            $price->price = $request->price;
            $price->application_id = $app->id;
            $price->save();            

        } 
        


        $app->update([
           
            'image' => $image,         
            'description' => $request['description']

        ]);

        return redirect()->route('show_app',$app)->with('status','Application modified.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($app)
    {
        $app = Application::find($app);
        $app->status = 'disable';
        $app->save();

        return redirect()->route('home')->with('status','Application disabled.');

    }

    public function search(Request $request)
    {

        $search = $request->search;    
        $apps = Application::where('name','LIKE',"%$search%")->get();       
        
        return view('home',compact('apps'));

    }

    public function buy($app)
    {
        
        $app = Application::find($app);
        
        $purchase = new Purchase;
        $purchase->application_id = $app->id;
        $purchase->user_id = Auth::user()->id;
        $purchase->price = $app->price();
        $purchase->save();
        
        return $purchase;
    }

    public function wish($app)
    {
        $app = Application::find($app);
        
        $wish = new Wishlist;
        $wish->application_id = $app->id;
        $wish->user_id = Auth::user()->id;
        $wish->save();
        
        return $wish;
    }

    public function cancel_wish($app)
    {
        $wish = Wishlist::where('application_id','=',$app)->where('user_id','=',Auth::user()->id)->first();

        $wish->delete();

        return 'false';
    }


    public function cancel_buy($app)
    {
        $buy = Purchase::where('application_id','=',$app)->where('user_id','=',Auth::user()->id)->first();
        $buy->delete();
    }






}
