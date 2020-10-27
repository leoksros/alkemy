@extends('layouts.app')



@section('content')
<div class="container">


    <div class="row justify-content-center">
       
    
        <div class="col-md-8">
   
            <h1>{{$category->name}}</h1>

            <div class="row row-cols-1 row-cols-md-3">

                @forelse ($apps as $app)
                    <div class="col mb-4">
                        <div class="card">
                        <img src="{{asset("/storage/$app->image")}}" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                        <a href="{{route('show_app',$app)}}"><h5 class="card-title">{{$app->name}}</h5></a> 
                            <p class="card-text">{{$app->price()}}</p>
                        </div>
                        </div>
                    </div>
                @empty
                    Category is empty.
                @endforelse
                
            </div>
            


        </div>
    </div>
</div>
@endsection
