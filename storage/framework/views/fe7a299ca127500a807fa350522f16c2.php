<?php $__env->startSection('content'); ?>
<!-- Include Toastr CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />



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
    border: none;
    border-radius: 8px;
    height: 30px;
    padding: 5px 10px;
    text-align: left;
    display: flex;
    align-items: center;
    width: 100%;
    font-size:16px;
    box-sizing: border-box; 
    cursor: pointer; 
    font-weight:500;
}

.category-icon {
    width: 26px; 
    height: 26px; 
    margin-right: 8px; 
    vertical-align: middle; 
}

/* flash sale page */
.sale-item {
    text-align: center;
    padding: 5px; 
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    box-sizing: border-box;
    margin-bottom: 15px;
    width: 110%; 
}

.sale .row {
    display: flex;
    justify-content: flex-start;
    flex-wrap: wrap;
}

.sale-item:hover {
    border: 1px solid #e1e1e1;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); 
}

.sale-item a {
    text-decoration: none;
    color: black;
}

.sale-item img {
    width: 100%;
    height: auto;
    object-fit: cover;
    margin-bottom: 5px;
}

.sale-image-wrapper {
    width: 100%;
    height: 280px; 
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
}

.sale-image-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover; 
}

.sale-item h6 {
    text-align: left;
    font-size: 15px; 
    margin: 2px 0;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.sale-item .price {
    text-align: left;
    color: orange;
    font-size: 15px; 
    font-weight: bold;
}
</style>


<?php if(session('status')): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            toastr.success("<?php echo e(session('status')); ?>", 'Success', {
                positionClass: 'toast-top-right'
            });
        });
    </script>
<?php endif; ?>
<nav class="navbar navbar-expand-lg navbar-light fixed-top p-0 m-0">
    <div class="container mb-3"  style="display: flex; flex-direction: column;">
        <div class="row w-100">
            <div class="col-md-4 d-flex justify-content-center justify-content-md-start align-items-center mb-md-0">
                <a href="<?php echo e(url('/')); ?>" class="d-flex align-items-center" style="text-decoration: none">
                    <div class="navbar-brand">
                        <img src="/assets/images/logo2.png" height="70" width="40" alt="Logo"/>
                    </div>
                    <img src="/assets/images/brand_name.png" height="30" width="320" alt="brand"/>
                </a>
            </div>
            <div class="col-md-4 mt-4">
                <form class="d-flex input-group w-auto my-auto mb-md-0">
                    <input autocomplete="off" type="search" class="form-control rounded" placeholder="Search" />
                    <span class="input-group-text border-0 d-none d-lg-flex"><i class="fas fa-search"></i></span>
                </form>
            </div>
            <div class="col-md-4 p-3 d-flex justify-content-center justify-content-md-end align-items-center">
                <div class="d-flex align-items-center">
                    <div class="dropdown me-3">
                        <a class="text-reset dropdown-toggle1" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bars"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?php echo e(route('all_items')); ?>">All Items</a></li>
                            <li><a class="dropdown-item" href="#">Questions</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('helpcenter')); ?>">Help Center</a></li>
                        </ul>
                    </div>
                    <span class="me-3">|</span>
                    <a class="text-reset me-5" href="<?php echo e(route('shopping_cart')); ?>" style="position: relative;">
                        <span style="font-size: 19px; position: relative;">
                            <i class="fas fa-shopping-cart"></i>
                        </span>
                        <span id="cart-count" class="badge badge-danger">
                            0
                        </span>
                    </a>
                    <?php if(auth()->guard()->guest()): ?>
                        <?php if(Route::has('login')): ?>
                            <a class="text-reset me-3" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">
                                <div style="font-weight:500">LOGIN</div>
                                <?php if(Route::has('register')): ?>
                                    <a class="signup-btn p-2" href="<?php echo e(route('register')); ?>" style="">SIGN UP</a>
                                <?php endif; ?>
                            </a>
                        <?php endif; ?>
                        <?php else: ?>
                        <div class="dropdown me-3">  
                         <a id="navbarDropdown" class="text-reset dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          <div class="icon-circle">
                          <?php if(Auth::user()->profile_image): ?>
                            <img src="<?php echo e(asset('storage/' . Auth::user()->profile_image)); ?>" style="width: 33px; height: 33px; border-radius: 50%; object-fit: cover;" class="profile_image">
                          <?php else: ?>
                            <span style="font-size: 17px;"><?php echo e(Auth::user()->name[0]); ?></span>
                          <?php endif; ?>
                        </div>
                            <span class="ms-2"><?php echo e(Auth::user()->name); ?></span>
                         </a>
                       <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo e(route('dashboard')); ?>" style="font-size: 15px;">
                          <?php echo e(__('My Profile')); ?>

                        </a>
                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="font-size: 15px;">
                          <?php echo e(__('Logout')); ?>

                        </a>
                      <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                       <?php echo csrf_field(); ?>
                       </form>
                     </div>
                    </div>

                   <?php endif; ?>

                </div>
            </div>
        </div>

       <!-- Navbar Divider -->
        <div class="navbar-divider w-100 p-0 mb-1">
                <div class="container d-flex justify-content-center align-items-center" style="width: 65%;">
                    <div class="category-select-wrapper1 d-flex justify-content-center align-items-center">
                        <div class="custom-dropdown w-100 ms-4">
                            <div class="dropdown-toggle" id="dropdownMenuButton" aria-expanded="false">
                                <i class="fas fa-bars me-2"></i> All Categories
                            </div>
                            <div class="dropdown-menu">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="dropdown-item dropdown-submenu">
                                        <a href="<?php echo e(route('user_products', ['category' => $category->parent_category])); ?>">
                                            <img src="<?php echo e(asset('storage/category_images/' . $category->image)); ?>" alt="<?php echo e($category->parent_category); ?> icon" class="category-icon">
                                            <?php echo e($category->parent_category); ?>

                                        </a>
                                        <div class="dropdown-menu multi-column">
                                            <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="dropdown-column">
                                                    <a href="<?php echo e(route('user_products', ['category' => $category->parent_category, 'subcategory' => $subcategory->subcategory])); ?>">
                                                        <strong style="font-size:16px;"><?php echo e($subcategory->subcategory); ?></strong>
                                                    </a>
                                                    <?php $__currentLoopData = $subcategory->subSubcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subSubcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <a href="<?php echo e(route('user_products', ['category' => $category->parent_category, 'subcategory' => $subcategory->subcategory, 'subsubcategory' => $subSubcategory->sub_subcategory])); ?>">
                                                            <?php echo e($subSubcategory->sub_subcategory); ?>

                                                        </a>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>

                    <!-- other Links -->
                    <div class="d-flex justify-content-center align-items-center flex-grow-1 otherlinks" style="font-size:16px;">
                        <a href="<?php echo e(route('all_items')); ?>" class="mx-3">All Items</a>
                        <a href="<?php echo e(route('special_offerproducts')); ?>" class="mx-3">Special Offers</a>
                        <a href="<?php echo e(route('sale_products')); ?>" class="mx-3">Flash Sale</a>
                        <a href="<?php echo e(route('best_sellers')); ?>" class="mx-3">Bestsellers</a>
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
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="email" class="form-label"><?php echo e(__('Email Address')); ?><i class="text-danger">*</i></label>
                            <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label"><?php echo e(__('Password')); ?> <i class="text-danger">*</i></label>
                            <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                            <label class="form-check-label" for="remember"><?php echo e(__('Remember Me')); ?></label>
                        </div>
                        <?php if(Route::has('password.request')): ?>
                            <div>
                                <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>"><?php echo e(__('Forgot Your Password?')); ?></a>
                            </div>
                        <?php endif; ?>
                        <button type="submit" class="btn btn-primary w-100 mt-4 mb-3"><?php echo e(__('Login')); ?></button>
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
    <?php if($errors->has('email') || $errors->has('password')): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
            var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
            loginModal.show();
            });
        </script>
    <?php endif; ?>


<!-- categories view -->
<div class="container shopping-titles mt-4 mb-3" style="width: 80%;">
    <div class="row mt-5 row-cols-2 row-cols-md-3 row-cols-lg-6 g-2">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col text-center category-circle">
            <a href="<?php echo e(route('user_products', ['category' => $category->parent_category])); ?>">
                <img src="<?php echo e(asset('storage/category_images/' . $category->image)); ?>" alt="<?php echo e($category->parent_category); ?>" class="rounded-circle">
                <p class="mt-2"><?php echo e($category->parent_category); ?></p>
            </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>






<!-- Special Offers -->
<div class="container mt-5 mb-4 special-offers" style="width:76%;">
    <a href="<?php echo e(route('special_offerproducts')); ?>" style="text-decoration: none; color:black;"><h4>Special Offers</h4></a>
    <div class="row justify-content-between">
        <?php $__currentLoopData = $specialOffers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-2 col-sm-5 col-6">
                <div class="special-offer-item mb-2">
                    <a href="<?php echo e(route('single_product_page', ['product_id' => $offer->product_id])); ?>">
                        <?php if($offer->product->images->isNotEmpty()): ?>
                            <img src="<?php echo e(asset('storage/' . $offer->product->images->first()->image_path)); ?>" class="card-img-top" alt="<?php echo e($offer->product->product_name); ?>"/>
                        <?php else: ?>
                            <img src="" class="card-img-top" alt="Default Image"/>
                        <?php endif; ?>
                        <div class="card-body">
                            <h5><?php echo e($offer->product->product_name); ?></h5>
                            <div class="price">Rs.<?php echo e(number_format($offer->offer_price, 2)); ?> <s style="font-size:12px; color: #989595; font-weight:500">Rs.<?php echo e(number_format($offer->normal_price, 2)); ?></s></div>
                            <div class="discount"><?php echo e($offer->offer_rate); ?>% off</div>
                        </div>
                    </a>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>



<!--Flash Sale Section-->
<div class="container mt-5 flash-sale" style="width:76%; background: linear-gradient(to top, #f0f0f0, #ffffff);">
    <h4><i class="fas fa-bolt" style="color: #FFD43B;"></i> Flash Sale</h4>
    <div class="row mt-3" id="product-list">
            <?php $__currentLoopData = $flashSales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-6 col-sm-4 col-md-2 col-lg- mb-3">
                        <div class="sale-item position-relative">
                            <a href="<?php echo e(route('single_product_page', ['product_id' => $sale->product->product_id])); ?>" class="d-block text-decoration-none">
                                <div class="sale-image-wrapper position-relative">
                                    <?php if($sale->product->images->isNotEmpty()): ?>
                                        <img src="<?php echo e(asset('storage/' . $sale->product->images->first()->image_path)); ?>" alt="Product Image" class="img-fluid">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('storage/default-image.jpg')); ?>" alt="Default Image" class="img-fluid">
                                    <?php endif; ?>

                                    <!-- Flash Sale Icon -->
                                    <div class="flash-sale-icon position-absolute top-0 start-0 m-0 my-1">
                                        <span style="background-color: #FFD43B; color: black; padding: 5px; border-radius:none">
                                            <i class="fas fa-bolt"></i> <?php echo e(floor($sale->sale_rate)); ?>% 
                                        </span>
                                    </div>
                                </div>
                                <h6 class="product-name"><?php echo e(\Illuminate\Support\Str::limit($sale->product->product_name, 20, '...')); ?></h6>
                                <div class="price">
                                    <span class="offer-price">Rs. <?php echo e(number_format($sale->sale_price, 2)); ?></span><br>
                                    <s style="font-size: 14px; color: #989595; font-weight:500">Rs. <?php echo e(number_format($sale->normal_price, 2)); ?></s>
                                </div>
                            </a>
                        </div>
                    </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Include Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\esupport_systems\online-marketing\resources\views/home.blade.php ENDPATH**/ ?>