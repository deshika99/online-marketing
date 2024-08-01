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

    <!-- Feather Icons -->
    <link href="https://unpkg.com/feather-icons@4.28.0/dist/feather.css" rel="stylesheet">
    
    <style>
        .navbar {
            height: 70px; /* Set the height of the navbar */
            align-items: center; /* Vertically center the contents */
        }

        .navbar-brand img {
            height: 70px; /* Make the logo height 100% of the navbar height */
            object-fit: contain; /* Ensure the logo scales properly */
        }

        .dropdown-menu {
            border-radius: 10px; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
        }
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

            <!-- Toggler Button for Mobile (For Navbar Collapse) -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Center Search Bar -->
                <form class="d-flex mx-auto w-50" role="search">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        <span class="input-group-text">
                            <i data-feather="search"></i> <!-- Feather search icon -->
                        </span>
                    </div>
                </form>

                <ul class="navbar-nav ms-auto d-flex align-items-center">
                    <li class="nav-item dropdown me-3">
                        <a id="meanDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="menu"></i> <!-- Custom toggle icon -->
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="meanDropdown">
                            <a class="dropdown-item" href="#">Option 1</a>
                            <a class="dropdown-item" href="#">Option 2</a>
                        </div>
                    </li>

                    <!-- Cart -->
                    <li class="nav-item me-3">
                        <a class="nav-link" href="#">
                            <i data-feather="shopping-cart"></i> <!-- Feather icon for cart -->
                        </a>
                    </li>

                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item me-2">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
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

    <main class="py-4">
        @yield('content')
    </main>
    </div>

    @include('includes.script')

    <script src="https://unpkg.com/feather-icons@4.28.0/dist/feather.min.js"></script>
    <script>
        feather.replace(); // This initializes Feather icons
    </script>

</body>
</html>
