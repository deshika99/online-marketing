
        <header>
            <div class="text-center bg-white border-bottom">
                <div class="px-5">
                    <div class="row">
                    <div class="col-md-4 d-flex justify-content-center justify-content-md-start align-items-center mb-md-0">
                        <a href="{{ url('/') }}" class="d-flex align-items-center" style="text-decoration: none">
                            <div class="navbar-brand">
                                <img src="/assets/images/logo.png" height="70" width="40" alt="Logo"/>
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
                                    <a class="text-reset dropdown-toggle1" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-bars"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                        <li><a class="dropdown-item" href="#">All Items</a></li>
                                        <li><a class="dropdown-item" href="#">Questions</a></li>
                                        <li><a class="dropdown-item" href="#">Help Center</a></li>
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

        
        <!--categories-->
        <div class="navbar-divider">
            <div class="container d-flex justify-content-start align-items-center" style="width: 85%;">
                <div class="category-select-wrapper">
                    <div class="custom-dropdown">
                        <div class="dropdown-toggle" id="dropdownMenuButton" aria-expanded="false">
                            <i class="fas fa-bars me-3"></i> All Categories
                        </div>
                        <div class="dropdown-menu">
                            <div class="dropdown-item dropdown-submenu">
                                <a href="{{ route('dress') }}"><i class="fas fa-tshirt"></i> Dress</a>
                                <div class="dropdown-menu multi-column">
                                    <div class="dropdown-column">
                                        <strong>Baby</strong>
                                        <a href="#">Shirt</a>
                                        <a href="#">Tshirt</a>
                                        <a href="#">Shorts</a>
                                        <a href="#">Trouser</a>
                                        <a href="#">Denim</a>
                                        <a href="#">Frock</a>
                                        <a href="#">Skirt</a>
                                        <a href="#">Night Kit</a>
                                        <a href="#">Underwear</a>
                                    </div>
                                    <div class="dropdown-column">
                                        <strong>Gents</strong>
                                        <a href="#">Long Sleeve Shirt</a>
                                        <a href="#">Short Sleeve Shirt</a>
                                        <a href="#">Long Sleeve Tshirt</a>
                                        <a href="#">Short Sleeve Tshirt</a>
                                        <a href="#">Trouser</a>
                                        <a href="#">Denim</a>
                                        <a href="#">Trouser</a>
                                        <a href="#">Shorts</a>
                                        <a href="#">Sarong</a>
                                        <a href="#">Cap</a>
                                    </div>
                                    <div class="dropdown-column">
                                        <strong>Ladies</strong>
                                        <a href="#">Frock</a>
                                        <a href="#">Skirt</a>
                                        <a href="#">Blouse</a>
                                        <a href="#">Top</a>
                                        <a href="#">Tshirt</a>
                                        <a href="#">Shirt</a>
                                        <a href="#">Trouser</a>
                                        <a href="#">Denim</a>
                                        <a href="#">Shorts</a>
                                        <a href="#">Saree</a>
                                        <a href="#">Hat</a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="dropdown-item dropdown-submenu">
                                <a href="{{ route('cosmetics') }}"><i class="fas fa-paint-brush"></i>Cosmetics</a>
                                <div class="dropdown-menu multi-column">
                                    <div class="dropdown-column">
                                        <strong>Night Cream</strong>
                                        <a href="#">Fresh & White</a>
                                        <a href="#">Chandini</a>
                                        <a href="#">Biocos</a>
                                        <a href="#">Goree</a>
                                        <a href="#">Ujooba</a>
                                        <a href="#">Noor</a>
                                        <a href="#">Infocus</a>
                                        <a href="#">Loriss White</a>
                                        <a href="#">Pax</a>
                                        <a href="#">Oxygen</a>
                                        <a href="#">Skin White</a>
                                        <a href="#">Melacare</a>
                                    </div>
                                    <div class="dropdown-column">
                                        <strong>Day Cream</strong>
                                        <a href="#">Skin White</a>
                                        <a href="#">White Tone</a>
                                        <a href="#">Goree</a>
                                        <a href="#">Fair & Lovely</a>
                                        <a href="#">Ponds</a>
                                        <a href="#">Lotus</a>
                                        <a href="#">Brido</a>
                                        <a href="#">Himalaya</a>
                                        <a href="#">Dr Rashel</a>
                                        <a href="#">Turmeric Cream</a>
                                    </div>
                                    <div class="dropdown-column">
                                        <strong>Body Lotion</strong>
                                        <a href="#">Dr Rashel</a>
                                        <a href="#">Roushun</a>
                                        <a href="#">Kojic</a>
                                        <a href="#">Ujooba</a>
                                        <a href="#">Velvet</a>
                                        <a href="#">Nivea</a>
                                        <a href="#">Lafresh</a>
                                        <a href="#">Intimate</a>
                                        <a href="#">Body Butter</a>
                                        <a href="#">Aichun Beauty</a>
                                        <a href="#">Enchanter</a>
                                        <a href="#">Nature Papaya</a>
                                    </div>
                                    
                                    <div class="dropdown-column">
                                        <strong>Soap</strong>
                                        <a href="#">Papaya Soap</a>
                                        <a href="#">Kojic</a>
                                        <a href="#">Fresh & White</a>
                                        <a href="#">Candela</a>
                                        <a href="#">Aichun Beauty</a>
                                        <a href="#">K-Brothers (U.S.A)</a>
                                        <a href="#">Goree</a>
                                        <a href="#">Classic White</a>
                                        <a href="#">Aanya</a>
                                        <a href="#">Carotone</a>
                                        <a href="#">Dove</a>
                                        <a href="#">Enchanter</a>
                                    </div>
                                    <div class="dropdown-column">
                                        <strong>Underarm Cream</strong>
                                        <a href="#">Bioaqua</a>
                                        <a href="#">Carotone</a>
                                        <a href="#">Kojic</a>
                                        <a href="#">Aichun Beauty</a>
                                    </div>
                                    <div class="dropdown-column">
                                        <strong>Sunblock Cream</strong>
                                        <a href="#">Roushun</a>
                                        <a href="#">Dr Rashel</a>
                                        <a href="#">Lady Diana</a>
                                    </div>
                                    <div class="dropdown-column">
                                        <strong>Acne Cream</strong>
                                        <a href="#">Bioaqua</a>
                                        <a href="#">Himalaya</a>
                                        <a href="#">Lanbena</a>
                                        <a href="#">Off Marks</a>
                                        <a href="#">Aichun Beauty</a>
                                    </div>
                                    <div class="dropdown-column">
                                        <strong>Face Wash</strong>
                                        <a href="#">Junsui</a>
                                        <a href="#">Himalaya</a>
                                        <a href="#">Fresh & White</a>
                                        <a href="#">Goree</a>
                                        <a href="#">Biocos</a>
                                    </div>
                                    <div class="dropdown-column">
                                        <strong>Shampoo</strong>
                                        <a href="#">Olives</a>
                                        <a href="#">Vatika</a>
                                        <a href="#">Shello/a>
                                        <a href="#">Herb Line</a>
                                        <a href="#">Bellose</a>
                                        <a href="#">Dove</a>
                                        <a href="#">Meera</a>
                                        <a href="#">Loreal</a>
                                    </div>
                                    <div class="dropdown-column">
                                        <strong>Hair oil</strong>
                                        <a href="#">Kasha wardani</a>
                                        <a href="#">Bismi</a>
                                        <a href="#">Indulekha</a>
                                        <a href="#">Bellose</a>
                                        <a href="#">Vatika</a>
                                        <a href="#">Vesiline Hair Tonic</a>
                                        <a href="#">Olive Oil</a>
                                    </div>
                                    <div class="dropdown-column">
                                        <strong>Hair oil</strong>
                                        <a href="#">Kasha wardani</a>
                                        <a href="#">Bismi</a>
                                        <a href="#">Indulekha</a>
                                        <a href="#">Bellose</a>
                                        <a href="#">Vatika</a>
                                        <a href="#">Vesiline Hair Tonic</a>
                                        <a href="#">Olive Oil</a>
                                    </div>
                                    <div class="dropdown-column">
                                        <strong>Serum</strong>
                                        <a href="#">Perfume</a>
                                        <a href="#">Dr Rashel</a>
                                        <a href="#">AHA</a>
                                        <a href="#">Biocos</a>
                                        <a href="#">Fresh & White</a>
                                    </div>
                                    <div class="dropdown-column">
                                        <strong>Perfume</strong>
                                        <a href="#">BN 50ml</a>
                                        <a href="#">Passy</a>
                                        <a href="#">Fogg</a>
                                        <a href="#">Enchanter</a>
                                        <a href="#">Attar</a>
                                    </div>
                                    <div class="dropdown-column">
                                        <strong>Deodorant</strong>
                                        <a href="#">Enchanter</a>
                                        <a href="#">Simona</a>
                                        <a href="#">Nivea</a>
                                        <a href="#">Janet</a>
                                        <a href="#">Rexona</a>
                                    </div>
                                    <div class="dropdown-column">
                                        <strong>Powder</strong>
                                        <a href="#">White Tone</a>
                                        <a href="#">Spinz BB</a>
                                        <a href="#">Compact</a>
                                        <a href="#">Paris</a>
                                        <a href="#">Ponds</a>
                                    </div>
                                    <div class="dropdown-column">
                                        <strong>Foundation</strong>
                                        <a href="#">Huda Beauty</a>
                                        <a href="#">Miss Rose</a>
                                        <a href="#">Fit Me</a>
                                        <a href="#">Victoria's</a>
                                    </div>
                                    <div class="dropdown-column">
                                        <strong>Lipstick & Lip Balm</strong>
                                        <a href="#">Aloevera</a>
                                        <a href="#">Avocado</a>
                                        <a href="#">Green Tea</a>
                                        <a href="#">Magic Lipstick</a>
                                        <a href="#">Strawberry</a>
                                        <a href="#">Miss Rose</a>
                                    </div>
                                    <div class="dropdown-column">
                                        <strong>Cosmetics Tool</strong>
                                        <a href="#">Hair Iron</a>
                                        <a href="#">Hair Curling Machine</a>
                                        <a href="#">Trimmer</a>
                                        <a href="#">Electric Comb</a>
                                        <a href="#">Facial Steamer</a>
                                        <a href="#">Tweezer</a>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-item dropdown-submenu">
                                <a href="{{ route('toys') }}"><i class="fa-solid fa-puzzle-piece"></i>Toys</a>
                                <div class="dropdown-menu multi-column">
                                    <div class="dropdown-column">
                                        <strong>Toys</strong>
                                        <a href="#">Cars</a>
                                        <a href="#">Bicycle</a>
                                        <a href="#">Bus</a>
                                        <a href="#">Lorry</a>
                                        <a href="#">Flight</a>
                                        <a href="#">Doll</a>
                                        <a href="#">Animals</a>
                                        <a href="#">Vegetables</a>
                                    </div>
                                    <div class="dropdown-column">
                                    <a href="#">Kitchen Set</a>
                                        <a href="#">Building Blocks</a>
                                        <a href="#">Kite</a>
                                        <a href="#">Bat</a>
                                        <a href="#">Ball</a>
                                        <a href="#">Mask</a>
                                        <a href="#">Slime</a>
                                        <a href="#">Remote Toy</a>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-item dropdown-submenu">
                                <a href="{{ route('gifts') }}"><i class="fas fa-gift"></i>Gift Items</a>
                                <div class="dropdown-menu multi-column">
                                    <div class="dropdown-column">
                                        <strong>Gift Items</strong>
                                        <a href="#">Greeting Cards</a>
                                        <a href="#">Ornaments</a>
                                        <a href="#">Craft</a>
                                        <a href="#">Box</a>
                                        <a href="#">Bags</a>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-item dropdown-submenu">
                                <a href="{{ route('school_equipments') }}"><i class="fa-solid fa-pencil-ruler"></i>School Equipment</a>
                                <div class="dropdown-menu multi-column">
                                    <div class="dropdown-column">
                                        <strong>School Equipment</strong>
                                        <a href="#">Writing Book</a>
                                        <a href="#">Past Papers Book</a>
                                        <a href="#">Pencil</a>
                                        <a href="#">Pen</a>
                                        <a href="#">Pencil box</a>
                                    </div>
                                    <div class="dropdown-column">
                                        <a href="#">File</a>
                                        <a href="#">Bag</a>
                                        <a href="#">Bottle</a>
                                        <a href="#">Lunch Box</a>
                                        <a href="#">Umbrella</a>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-item dropdown-submenu">
                                <a href="{{ route('phone_Accessories') }}"><i class="fas fa-mobile-alt"></i>Phone Accessories</a>
                                <div class="dropdown-menu multi-column">
                                    <div class="dropdown-column">
                                        <strong>Phone Accessories</strong>
                                        <a href="#">Smart Watch</a>
                                        <a href="#">Keyboard</a>
                                        <a href="#">Hand free</a>
                                        <a href="#">Ear buds</a>
                                        <a href="#">Phone Holder</a>
                                    </div>
                                    <div class="dropdown-column">
                                        <a href="#">Tempered</a>
                                        <a href="#">USB Cable</a>
                                        <a href="#">OTG</a>
                                        <a href="#">Charger</a>
                                        <a href="#">Ear Buds Case</a>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-item dropdown-submenu">
                                <a href="{{ route('baby_things') }}"><i class="fas fa-baby"></i>Baby Things</a>
                                <div class="dropdown-menu multi-column">
                                    <div class="dropdown-column">
                                        <strong>Baby Things</strong>
                                        <a href="#">Brush</a>
                                        <a href="#">Diapers</a>
                                        <a href="#">Milk Bottle</a>
                                        <a href="#">Bags</a>
                                        <a href="#">Mug</a>
                                    </div>
                                    <div class="dropdown-column">
                                        <a href="#">Cups</a>
                                        <a href="#">Feeding Set</a>
                                        <a href="#">Plate</a>
                                        <a href="#">Nail Cutter</a>
                                        <a href="#">Napkin</a>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-item dropdown-submenu">
                                <a href="{{ route('house_hold_goods') }}"><i class="fas fa-couch"></i>House Hold Goods</a>
                                <div class="dropdown-menu multi-column">
                                    <div class="dropdown-column">
                                        <strong>House Hold Goods</strong>
                                        <a href="#">Cup Set</a>
                                        <a href="#">Racks</a>
                                        <a href="#">Plate</a>
                                        <a href="#">Mug</a>
                                        <a href="#">Beater</a>
                                        <a href="#">Rice Cooker</a>
                                        <a href="#">Gas Cooker</a>
                                        <a href="#">Hot Plate</a>
                                        <a href="#">Blender</a>
                                        <a href="#">Oven</a>
                                        <a href="#">Iron</a>
                                        <a href="#">Spoon</a>
                                    </div>
                                    <div class="dropdown-column">
                                        <a href="#">Electric Kettle</a>
                                        <a href="#">Mat</a>
                                        <a href="#">Toaster</a>
                                        <a href="#">TV</a>
                                        <a href="#">Radio</a>
                                        <a href="#">fan</a>
                                        <a href="#">Speaker</a>
                                        <a href="#">Knife</a>
                                        <a href="#">Chair</a>
                                        <a href="#">Table</a>
                                        <a href="#">Bucket</a>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-item dropdown-submenu">
                                <a href="{{ route('food') }}"><i class="fas fa-utensils"></i>Food</a>
                                <div class="dropdown-menu multi-column">
                                    <div class="dropdown-column">
                                        <strong>Food</strong>
                                        <a href="#">Chocolate</a>
                                        <a href="#">Noodles</a>
                                        <a href="#">Toffee</a>
                                        <a href="#">Pasta</a>
                                        <a href="#">Drinks</a>
                                    </div>
                                    <div class="dropdown-column">
                                        <a href="#">Dates</a>
                                        <a href="#">Chees</a>
                                        <a href="#">Sweets</a>
                                        <a href="#">Biscuits</a>
                                        <a href="#">Snakes</a>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-item dropdown-submenu">
                                <a href=""><i class="fas fa-football-ball"></i>Hobby & Sports</a>
                                <div class="dropdown-menu multi-column">
                                    <div class="dropdown-column">
                                        <strong>Hobby & Sports</strong>
                                        <a href="#">Bat</a>
                                        <a href="#">Ball</a>
                                        <a href="#">Badminton</a>
                                        <a href="#">Chess Board</a>
                                        <a href="#">Carrom Board</a>
                                        <a href="#">Sport Shoe</a>
                                        <a href="#">Sport Dress</a>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-item dropdown-submenu">
                                <a href=""><i class="fas fa-gem"></i>Jewelary</a>
                                <div class="dropdown-menu multi-column">
                                    <div class="dropdown-column">
                                        <strong>Jewelary</strong>
                                        <a href="#">Chain</a>
                                        <a href="#">Ring</a>
                                        <a href="#">Pendent</a>
                                        <a href="#">Bracelet</a>
                                        <a href="#">Bengals</a>
                                        <a href="#">Earrings</a>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-item dropdown-submenu">
                                <a href=""><i class="fa-solid fa-glasses"></i>Fashion</a>
                                <div class="dropdown-menu multi-column">
                                    <div class="dropdown-column">
                                        <strong>Fashion</strong>
                                        <a href="#">Watch</a>
                                        <a href="#">Bags</a>
                                        <a href="#">Shoe</a>
                                        <a href="#">Slippers</a>
                                        <a href="#">Sunglass</a>
                                        <a href="#">Hair pin</a>
                                        <a href="#">Hair Band</a>
                                        <a href="#">Hair Bool</a>
                                    </div>
                                    <div class="dropdown-column">
                                        <a href="#">Wallet</a>
                                        <a href="#">Belt</a>
                                        <a href="#">Bow</a>
                                        <a href="#">Tie</a>
                                        <a href="#">Hair clips</a>
                                        <a href="#">Scrunches</a>
                                        <a href="#">Tattoo</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    

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





