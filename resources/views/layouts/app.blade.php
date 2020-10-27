<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Applications') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    {{ config('app.name', 'Applications') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item">
                           <a href="">Applications</a> 
                        </li>

                        @if(Auth::user()->user_type == 'developer')
                        <li class="nav-item">
                            <a href="{{route('create_app')}}">Create Application</a> 
                         </li>
                        

                         <li class="nav-item">
                            <a href="{{route('create_category')}}">Create Category</a> 
                         </li>

                         @endif

                        <li class="nav-item">
                            <div class="dropdown">
                                <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration: none;">
                                  Categories
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  
                                    @forelse ($categories as $category)
                                        <a class="dropdown-item" href="{{route('show_category',$category)}}">{{$category->name}}</a>
                                    @empty
                                        No
                                    @endforelse
                                
                                </div>
                              </div>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item">
                            <form method="GET" action="{{ route('search_app') }}">
                                @csrf
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" name="search" placeholder="Ingresar búsqueda" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                  <div class="input-group-append">
                                    <button class="btn btn-success" type="submit">Search</i></button>
                                  </div>
                                </div>
                            </form>
                        </li>

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>                            
                        @else
                                
                            
                       
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    @if(Auth::user()->user_type == 'client')
                                        <a href="{{route('client_apps')}}" class="dropdown-item">
                                            My Applications
                                        </a>
                                    @else
                                        <a href="{{route('developer_apps')}}" class="dropdown-item">
                                            My Applications
                                        </a>
                                    @endif

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>

                                
                            </li>

                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
