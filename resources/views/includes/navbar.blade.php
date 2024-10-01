<style>
    .navbar-divider {
    height: 40px;
    background-color: #05467c;
    padding: 10px;
    display: flex;
    align-items: center;
    }

    .otherlinks a{
    text-decoration:none;
    color:white;
    font-weight:500;
   }

   .category-icon {
    width: 26px; 
    height: 26px; 
    margin-right: 8px; 
    vertical-align: middle; 
}

</style>
        <header>
            <div class="text-center bg-white border-bottom">
                <div class="px-5">
                    <div class="row">
                    <div class="col-md-4 d-flex justify-content-center justify-content-md-start align-items-center mb-md-0">
                        <a href="{{ url('/') }}" class="d-flex align-items-center" style="text-decoration: none">
                            <div class="navbar-brand">
                                <img src="/assets/images/logo.png" height="60" width="40" alt="Logo"/>
                            </div>
                            <img src="/assets/images/brand_name.png" height="27" width="290" alt="brand"/>
                        </a>
                    </div>


                        <div class="col-md-5 mt-2">
                            <form class="d-flex input-group w-auto my-auto mb-3 mb-md-0">
                                <input autocomplete="off" type="search" class="form-control rounded" placeholder="Search" />
                                <span class="input-group-text border-0 d-none d-lg-flex"><i class="fas fa-search"></i></span>
                            </form>
                        </div>

                        <div class="col-md-3 mb-2 d-flex justify-content-center justify-content-md-end align-items-center">
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
                                        <div  style="font-weight:500">
                                           LOGIN
                                        </div>
                                        @if (Route::has('register'))
                                            <a class="signup-btn p-2" href="{{ route('register') }}" style="">
                                                SIGN UP
                                            </a>
                                        @endif
                                    </a>
                                @endif
                                @else
                                <div class="dropdown me-3"> 
                                        <a id="navbarDropdown" class="text-reset dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <div class="icon-circle">
                                          @if(Auth::user()->profile_image)
                                            <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" style="width: 35px; height: 35px; border-radius: 50%; object-fit: cover;" class="profile_image">

                                          @else
                                             {{ Auth::user()->name[0] }}
                                          @endif
                                        </div>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('dashboard') }}">
                                            {{ __('My Profile') }}
                                        </a>

                                        <!-- Logout link -->
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                                @endguest

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
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           <!-- Navbar Divider -->
        <div class="navbar-divider w-100 p-0">
                <div class="container d-flex justify-content-center align-items-center" style="width: 60%;">
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
                    <div class="d-flex justify-content-center align-items-center flex-grow-1 otherlinks">
                        <a href="{{ route('all_items') }}" class="mx-3">All Items</a>
                        <a href="{{ route('special_offerproducts') }}" class="mx-3">Special Offers</a>
                        <a href="#" class="mx-3">Flash Sale</a>
                        <a href="#" class="mx-3">Bestsellers</a>
                        <a href="#" class="mx-3">Super Deals</a>
                    </div>
                </div>
        </div>
    
</header>

        
     


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
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


        
    </script>





