@extends('layouts.app')



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            @if (session('status'))
                <div class="alert alert-success text-center">
                    {{ session('status') }}
                </div>
            @elseif(session('no'))
                    <div class="alert alert-danger text-center">
                        {{ session('no') }}
                    </div>
            @endif
   
            <div class="row justify-content-center">
                <div class="col">
                    <h1>{{$title}}</h1>
                </div>
              
            </div>
            @if(count($apps) > 0)
                <div class="row row-cols-1 row-cols-md-3">
                    @foreach ($apps as $app)
                        <div class="col mb-4">
                            <div class="card h-100">                            
                                <img src="{{asset("/storage/$app->image")}}" class="card-img-top img-fluid p-1" alt="...">
                            <div class="card-body">
                            <a href="{{route('show_app',$app)}}"><h5 class="card-title">{{$app->name}}</h5></a> 
                                <p class="card-text">{{$app->price()}}</p>
                            </div>
                            </div>
                        </div>
                    @endforeach                                
                </div>
            @else 
                
                <div class="h1 text-center">
                    We don't have registers of that :/
                </div>

            
            @endif
            
            


        </div>
    </div>
</div>
@endsection
