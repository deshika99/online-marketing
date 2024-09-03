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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">


    @include('includes.css')

   
<style>
    .dropdown-toggle::after {
        display: none; 
    }
</style>
</head>
<body>
    <div id="app">

    @if (!Request::is('/'))
    @include('includes.navbar')
@endif


        <main class="mb-5">
            @yield('content')
            
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
            
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            console.log("Fetching cart count from: {{ route('cart.count') }}");
            $.get("{{ route('cart.count') }}", function(data) {
                $('#cart-count').text(data.cart_count);
            });
            $(document).ready(function() {
                console.log("jQuery is working!");
            });

        });
    </script>


 
    @include('includes.footer')
</body>
</html>
