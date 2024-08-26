
        <header>
            <div class="text-center bg-white border-bottom">
                <div class="container">
                    <div class="row">
                    <div class="col-md-4 d-flex justify-content-center justify-content-md-start align-items-center mb-md-0">
                        <a href="{{ url('/') }}" class="d-flex align-items-center" style="text-decoration: none">
                            <div class="navbar-brand">
                                <img src="/assets/images/logo.png" height="70" width="70" alt="Logo"/>
                            </div>
                            <img src="/assets/images/brand_name.png" height="30" width="320" alt="brand"/>
                        </a>
                    </div>


                        <div class="col-md-6 p-3">
                            <form class="d-flex input-group w-auto my-auto mb-3 mb-md-0">
                                <input autocomplete="off" type="search" class="form-control rounded" placeholder="Search" />
                                <span class="input-group-text border-0 d-none d-lg-flex"><i class="fas fa-search"></i></span>
                            </form>
                        </div>

                        <div class="col-md-2 d-flex justify-content-center justify-content-md-end align-items-center">
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
                                    <span id="cart-count" class="badge badge-danger" style="background-color: #dc3545; color: #fff; 
                                    height:19px; width:auto;">0</span>
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

           
        <div class="navbar-divider">
        <div class="container d-flex justify-content-start align-items-center" style="width: 85%;">
            <div class="category-select-wrapper">
                <div class="custom-dropdown">
                    <div class="dropdown-toggle" id="dropdownMenuButton" aria-expanded="false">
                        <i class="fas fa-bars me-3"></i> All Categories
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('dress') }}"><i class="fas fa-tshirt"></i> Dress</a>
                        <a class="dropdown-item" href="{{ route('toys') }}"><i class="fa-solid fa-puzzle-piece"></i>  Toys</a>
                        <a class="dropdown-item" href="{{ route('cosmetics') }}"><i class="fas fa-paint-brush"></i> Cosmetics</a>
                        <a class="dropdown-item" href="{{ route('gifts') }}"><i class="fas fa-gift"></i> Gift Items</a>
                        <a class="dropdown-item" href="{{ route('phone_Accessories') }}"><i class="fas fa-mobile-alt"></i> Phone Accessories</a>
                        <a class="dropdown-item" href="{{ route('school_equipments') }}"><i class="fa-solid fa-pencil-ruler"></i> School Equipment</a>
                        <a class="dropdown-item" href="{{ route('baby_things') }}"><i class="fas fa-baby"></i> Baby Things</a>
                        <a class="dropdown-item" href="{{ route('house_hold_goods') }}"><i class="fas fa-couch"></i> Household Goods</a>
                        <a class="dropdown-item" href="{{ route('food') }}"><i class="fas fa-utensils"></i> Food</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-football-ball"></i> Hobby & Sports</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-gem"></i> Jewelry</a>
                        <a class="dropdown-item" href="#"><i class="fa-solid fa-glasses"></i>Fashion</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

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

 
