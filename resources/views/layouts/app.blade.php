<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Online Marketing Complex</title>
    <title>{{ config('app.name', 'Online Marketing Complex') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @include('includes.css')

   
<style>
    .dropdown-toggle::after {
        display: none; 
    }
</style>
</head>
<body>
    <div id="app">

        <header>
            <div class="p-3 text-center bg-white border-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 d-flex justify-content-center justify-content-md-start mb-1 mb-md-0">
                            <a href="{{ url('/') }}" class="ms-md-4">
                                <img src="/assets/images/logo.png" height="45" width="45"/>
                            </a>
                        </div>

                        <div class="col-md-4">
                            <form class="d-flex input-group w-auto my-auto mb-3 mb-md-0">
                                <input autocomplete="off" type="search" class="form-control rounded" placeholder="Search" />
                                <span class="input-group-text border-0 d-none d-lg-flex"><i class="fas fa-search"></i></span>
                            </form>
                        </div>

                        <div class="col-md-4 d-flex justify-content-center justify-content-md-end align-items-center">
                            <div class="d-flex align-items-center">
                               
                                <div class="dropdown me-3">
                                    <a class="text-reset dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-bars"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                        <li><a class="dropdown-item" href="#">Some news</a></li>
                                        <li><a class="dropdown-item" href="#">Another news</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div>

                                <span class="me-3">|</span>
                                
                                <a class="text-reset me-4" href="{{ route('shopping_cart') }}">
                                    <span><i class="fas fa-shopping-cart"></i></span>
                                </a>

                                @guest
                                    @if (Route::has('login'))
                                        <a class="text-reset me-3" href="{{ route('login') }}">
                                            <div class="icon-circle">
                                                <i class="fas fa-user-alt"></i>
                                            </div>
                                        </a>
                                    @endif
                                @else
                                    <div class="dropdown me-3">
                                        <a id="navbarDropdown" class="text-reset dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <div class="icon-circle">
                                                {{ Auth::user()->name[0] }}
                                            </div>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                @endguest

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="navbar-divider"></div>

        <main class="mb-5">
            @yield('content')
        </main>
    </div>

    @include('includes.script')

                             




    <script>
        feather.replace(); 
    </script>
    @include('includes.footer')
</body>
</html>
