@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Edit application') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update_app', $app) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col">
                                <div class="form-group row">
                                    <label for="name" class="tituloArticulo col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
        
                                    <div class="col-md-6">
                                        <input  disabled id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$app->name}}" required autocomplete="name" autofocus>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="description" class="tituloArticulo col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
        
                                    <div class="col-md-6">
                                        <input  id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{$app->description}}" required autocomplete="description" autofocus>
        
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="price" class="tituloArticulo col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{$app->price()}}" required autocomplete="price" autofocus>
        
                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>                                    
                                
        
                                <div class="form-group row">
                                    <label  for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
        
                                    <div class="col-md-6">
                                        <select disabled class="form-control" name="category_id" id="category_id">

                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{$category->name}}</option>                                        
                                            @endforeach
        
                                        </select>
                                        @error('category_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>                         
        
                                
                            </div>

                            <div class="col-sm-12 col-lg-5">
                            
                                    <img src="{{asset("/storage/$app->image")}}"  alt="" class="img-fluid align-middle">
                            
                                <div class="form-group row">
                                    <label for="image" class="tituloArticulo col-md-4 col-form-label text-md-right">{{ __('Change image') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image" autofocus>
        
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>                          
                            </div>

                            

                        </div>

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Upload changes') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection