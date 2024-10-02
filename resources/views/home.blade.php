@extends('layouts.app')

@section('content')

<style>
 .card-title {
    text-align: center; 
    color:white;
    font-size: 17px;
 }
    .shopping-titles .card{
    border-radius: 15px; 
    overflow: hidden; 
    width:90%;

}
.card-title i {
    margin-right: 7px; 
    font-size: 1.2em;  
}

.rounded-circle{
    width:110px;
    background-color: #f5f5f5;
}

.category-circle a{
    color: black;
    font-weight: 500;
}


.navbar-scrolled {
    background-color: #fff; 
    transition: background-color 0.3s ease;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1); 
}


.navbar-divider {
    height: 35px;
    display: flex;
    align-items: center;
}

.custom-dropdown .dropdown-toggle {
    background-color: transparent;
    color: black;
    border: 1px solid black;
    border-radius: 8px;
    height: 30px;
    padding: 5px 10px;
    text-align: left;
    display: flex;
    align-items: center;
    width: 100%;
    box-sizing: border-box; 
    cursor: pointer; 
}

.category-icon {
    width: 26px; 
    height: 26px; 
    margin-right: 8px; 
    vertical-align: middle; 
}


</style>

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<nav class="navbar navbar-expand-lg navbar-light fixed-top p-0 m-0">
    <div class="container mb-3"  style="display: flex; flex-direction: column;">
        <div class="row w-100">
            <div class="col-md-4 d-flex justify-content-center justify-content-md-start align-items-center mb-md-0">
                <a href="{{ url('/') }}" class="d-flex align-items-center" style="text-decoration: none">
                    <div class="navbar-brand">
                        <img src="/assets/images/logo2.png" height="70" width="40" alt="Logo"/>
                    </div>
                    <img src="/assets/images/brand_name.png" height="30" width="320" alt="brand"/>
                </a>
            </div>
            <div class="col-md-5 mt-4">
                <form class="d-flex input-group w-auto my-auto mb-md-0">
                    <input autocomplete="off" type="search" class="form-control rounded" placeholder="Search" />
                    <span class="input-group-text border-0 d-none d-lg-flex"><i class="fas fa-search"></i></span>
                </form>
            </div>
            <div class="col-md-3 p-3 d-flex justify-content-center justify-content-md-end align-items-center">
                <div class="d-flex align-items-center">
                    <div class="dropdown me-3">
                        <a class="text-reset dropdown-toggle1" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bars"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('all_items') }}">All Items</a></li>
                            <li><a class="dropdown-item" href="#">Questions</a></li>
                            <li><a class="dropdown-item" href="{{ route('helpcenter') }}">Help Center</a></li>
                        </ul>
                    </div>
                    <span class="me-3">|</span>
                    <a class="text-reset me-5" href="{{ route('shopping_cart') }}" style="position: relative;">
                        <span style="font-size: 19px; position: relative;">
                            <i class="fas fa-shopping-cart"></i>
                        </span>
                        <span id="cart-count" class="badge badge-danger">
                            0
                        </span>
                    </a>
                    @guest
                        @if (Route::has('login'))
                            <a class="text-reset me-3" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">
                                <div style="font-weight:500">LOGIN</div>
                                @if (Route::has('register'))
                                    <a class="signup-btn p-2" href="{{ route('register') }}" style="">SIGN UP</a>
                                @endif
                            </a>
                        @endif
                    @else
                    <div class="dropdown me-3"> 
                                        <a id="navbarDropdown" class="text-reset dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <div class="icon-circle">
                                          @if(Auth::user()->profile_image)
                                            <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" style="width: 33px; height: 33px; border-radius: 50%; object-fit: cover;" class="profile_image">

                                          @else
                                             {{ Auth::user()->name[0] }}
                                          @endif
                                        </div>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('dashboard') }}">
                                {{ __('My Profile') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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

       <!-- Navbar Divider -->
        <div class="navbar-divider w-100 p-0 mb-1">
                <div class="container d-flex justify-content-center align-items-center" style="width: 75%;">
                    <div class="category-select-wrapper1 d-flex justify-content-center align-items-center">
                        <div class="custom-dropdown w-100 ms-4">
                            <div class="dropdown-toggle" id="dropdownMenuButton" aria-expanded="false">
                                <i class="fas fa-bars me-3"></i> All Categories
                            </div>
                            <div class="dropdown-menu">
                                @foreach ($categories as $category)
                                    <div class="dropdown-item dropdown-submenu">
                                        <a href="{{ route('user_products', ['category' => $category->parent_category]) }}">
                                            <img src="{{ asset('storage/category_images/' . $category->image) }}" alt="{{ $category->parent_category }} icon" class="category-icon">
                                            {{ $category->parent_category }}
                                        </a>
                                        <div class="dropdown-menu multi-column">
                                            @foreach ($category->subcategories as $subcategory)
                                                <div class="dropdown-column">
                                                    <a href="{{ route('user_products', ['category' => $category->parent_category, 'subcategory' => $subcategory->subcategory]) }}">
                                                        <strong style="font-size:16px;">{{ $subcategory->subcategory }}</strong>
                                                    </a>
                                                    @foreach ($subcategory->subSubcategories as $subSubcategory)
                                                        <a href="{{ route('user_products', ['category' => $category->parent_category, 'subcategory' => $subcategory->subcategory, 'subsubcategory' => $subSubcategory->sub_subcategory]) }}">
                                                            {{ $subSubcategory->sub_subcategory }}
                                                        </a>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- other Links -->
                    <div class="d-flex justify-content-center align-items-center flex-grow-1 otherlinks" style="font-size:16px;">
                        <a href="{{ route('all_items') }}" class="mx-3">All Items</a>
                        <a href="{{ route('special_offerproducts') }}" class="mx-3">Special Offers</a>
                        <a href="#" class="mx-3">Flash Sale</a>
                        <a href="{{ route('best_sellers') }}" class="mx-3">Bestsellers</a>
                        <a href="#" class="mx-3">Super Deals</a>
                    </div>
                </div>
        </div>
</nav>


           

<!-- carousel -->
<div id="introCarousel" class="carousel slide carousel-fade shadow-2-strong" data-mdb-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-mdb-target="#introCarousel" data-mdb-slide-to="0" class="active me-1"></button>
        <button type="button" data-mdb-target="#introCarousel" data-mdb-slide-to="1" class="me-1"></button>
        <button type="button" data-mdb-target="#introCarousel" data-mdb-slide-to="2"></button>
    </div>

    <div class="carousel-inner">
        <div class="carousel-item active" style="background-image: url('/assets/images/slider/slider6.png');">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <h1 class="mb-4 mt-5">Elevate Your <br>Lifestyle</h1>
                    <h5 class="mb-4 mt-5">On home & living, leisure & more</h5>
                    <!--<a class="btn btn-outline-light btn-lg m-2" href="#" role="button" rel="nofollow">Add to Cart</a>-->
                </div>
            </div>
        </div>
        <div class="carousel-item" style="background-image: url('/assets/images/slider/slider6.png');">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <h1 class="mb-4 mt-5">Elevate Your <br>Lifestyle</h1>
                    <h5 class="mb-4 mt-5">On home & living, leisure & more</h5>
                    <!--<a class="btn btn-outline-light btn-lg m-2" href="#" role="button" rel="nofollow">Add to Cart</a>-->
                </div>
                
            </div>
        </div>

        <!--<div class="carousel-item" style="background-image: url('/assets/images/slider/slider7.png');">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="text-white">
                        <h1 class="mb-3">Summer<br>Fashion Sale</h1><br>
                        <h5 class="mb-4">New arrivals Summer Collection</h5>
                        <h4 class="mt-5 text-white">UP TO 50% OFF</h4>
                    </div>
                </div>
        </div>-->

    </div>

    <a class="carousel-control-prev" href="#introCarousel" role="button" data-mdb-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#introCarousel" role="button" data-mdb-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>






<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}<i class="text-danger">*</i></label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }} <i class="text-danger">*</i></label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                        </div>
                        @if (Route::has('password.request'))
                            <div>
                                <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                            </div>
                        @endif
                        <button type="submit" class="btn btn-primary w-100 mt-4 mb-3">{{ __('Login') }}</button>
                    </form>
                    <div class="text-center mt-1">
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <hr class="flex-grow-1">
                            <span class="mx-2 text-secondary">Or continue with</span>
                            <hr class="flex-grow-1">
                        </div>
                        <a class="btn btn-floating" href="#!" role="button">
                            <i class="fa-brands fa-facebook fa-3x" style="color: #2ba2fd;"></i>
                        </a>
                        <a class="btn btn-floating" href="#!" role="button">
                            <i class="fab fa-google fa-3x"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Login Modal -->
    @if ($errors->has('email') || $errors->has('password'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
            var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
            loginModal.show();
            });
        </script>
    @endif


<!-- categories view -->
<div class="container shopping-titles mt-4 mb-3" style="width: 80%;">
    <div class="row mt-5 row-cols-2 row-cols-md-3 row-cols-lg-6 g-2">
        @foreach ($categories as $category)
            <div class="col text-center category-circle">
            <a href="{{ route('user_products', ['category' => $category->parent_category]) }}">
                <img src="{{ asset('storage/category_images/' . $category->image) }}" alt="{{ $category->parent_category }}" class="rounded-circle">
                <p class="mt-2">{{ $category->parent_category }}</p>
            </a>
            </div>
        @endforeach
    </div>
</div>






<!-- Special Offers -->
<div class="container mt-5 mb-4 special-offers" style="width:76%;">
    <a href="{{ route('special_offerproducts') }}" style="text-decoration: none; color:black;"><h4>Special Offers</h4></a>
    <div class="row justify-content-between">
        @foreach ($specialOffers as $offer)
            <div class="col-md-2 col-sm-5 col-6">
                <div class="special-offer-item mb-2">
                    <a href="{{ route('single_product_page', ['product_id' => $offer->product_id]) }}">
                        @if ($offer->product->images->isNotEmpty())
                            <img src="{{ asset('storage/' . $offer->product->images->first()->image_path) }}" class="card-img-top" alt="{{ $offer->product->product_name }}"/>
                        @else
                            <img src="" class="card-img-top" alt="Default Image"/>
                        @endif
                        <div class="card-body">
                            <h5>{{ $offer->product->product_name }}</h5>
                            <div class="price">Rs.{{ number_format($offer->offer_price, 2) }} <s style="font-size:12px; color: #989595; font-weight:500">Rs.{{ number_format($offer->normal_price, 2) }}</s></div>
                            <div class="discount">{{ $offer->offer_rate }}% off</div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>




<!--Flash Sale-->
<div class="container mt-5 flash-sale" style="width:76%; background: linear-gradient(to top, #f0f0f0, #ffffff);">
    <h4><i class="fas fa-bolt" style="color: #FFD43B;"></i> Flash Sale</h4>
    <div class="row">
        <div class="col-md-2 col-sm-5 col-6 flash-sale-item">
            <img src="/assets/images/sale2.png" alt="Product 1">
            <h6>Brand new Bluetooth Earbuds </h6>
            <div class="price">Rs.1000</div>
        </div>
        <div class="col-md-2 col-sm-5 col-6 flash-sale-item">
            <img src="/assets/images/schl1.jpg" alt="Product 2">
            <h6>2.4G Wireless Mouse With USB Bluetooth Mouse Silent Computer Mice</h6>
            <div class="price">Rs.950</div>
        </div>
        <div class="col-md-2 col-sm-5 col-6 flash-sale-item">
            <img src="/assets/images/sale2.png" alt="Product 3">
            <h6>Buy Cow & Gate Step Up (1 - 3 Years) 350G</h6>
            <div class="price">Rs.1840</div>
        </div>
        <div class="col-md-2 col-sm-5 col-6 flash-sale-item">
            <img src="/assets/images/sale5.jpg" alt="Product 4">
            <h6>Microfiber Car Washing Sponge Towel Cloth Cleaning </h6>
            <div class="price">Rs.230</div>
        </div>
        <div class="col-md-2 col-sm-5 col-6 flash-sale-item">
            <img src="/assets/images/schl3.jpg" alt="Product 4">
            <h6>Buy Office 365 lifetime 5 Devices Online Activation for windows</h6>
            <div class="price">Rs.530</div>
        </div>
        <div class="col-md-2 col-sm-5 col-6 flash-sale-item">
            <img src="/assets/images/schl1.jpg" alt="Product 4">
            <h6>Buy Office 365 lifetime 5 Devices Online Activation for windows</h6>
            <div class="price">Rs.530</div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
 <script type="text/javascript" src="/assets/carousel/js/mdb.umd.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var dropdownToggle = document.getElementById('dropdownMenuButton');
            var dropdownMenu = dropdownToggle.nextElementSibling;

            dropdownToggle.addEventListener('click', function () {
                dropdownMenu.classList.toggle('show');
            });

            document.addEventListener('click', function (event) {
                if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.remove('show');
                }
            });
        });


        document.addEventListener('DOMContentLoaded', function() {
        const navbar = document.querySelector('.navbar');
        const scrollThreshold = 50; 

        function handleScroll() {
            if (window.scrollY > scrollThreshold) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        }

        window.addEventListener('scroll', handleScroll);

        handleScroll();
    });


    document.addEventListener('DOMContentLoaded', function () {
    const carousel = new mdb.Carousel(document.getElementById('introCarousel'), {
        interval: 2000,
        ride: 'carousel'
    });
    });

</script>



@endsection
