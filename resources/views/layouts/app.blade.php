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

    </style>
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/assets/images/logo.png" alt="Logo">
                </a>

               
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Center Search Bar -->
                    <form class="d-flex mx-auto w-50" role="search">
                        <div class="input-group">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                            <span class="input-group-text">
                                <i data-feather="search"></i> 
                            </span>
                        </div>
                    </form>

                    <ul class="navbar-nav ms-auto d-flex align-items-center">
                        <li class="nav-item dropdown me-3">
                            <a id="meanDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="menu"></i> 
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="meanDropdown">
                                <a class="dropdown-item" href="#">Option 1</a>
                                <a class="dropdown-item" href="#">Option 2</a>
                            </div>
                        </li>

                        <!-- Cart -->
                        <li class="nav-item me-3">
                            <a class="nav-link" href="{{ route('shopping_cart') }}">
                                <div class="icon-cart">
                                    <i class="fas fa-shopping-cart"></i> 
                                </div>
                            </a>
                        </li>

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                            <li class="nav-item me-2">
                                <a class="nav-link" href="{{ route('login') }}">
                                    <div class="icon-circle">
                                        <i class="fas fa-user-alt"></i>
                                    </div>
                                </a>
                            </li>

                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
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
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="navbar-divider"></div>

        <main>
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
