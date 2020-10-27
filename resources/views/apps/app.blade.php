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
            
      
        <application-component :app="{{ $app }} " :price="{{ $app->price() }}" :buyed=" {{ $buyed }}" :wished="{{ $wished }}" ></application-component>
                    
      

        </div>
    </div>
</div>

@endsection