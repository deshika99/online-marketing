
<style>
    .navbar-divider {
        height: 40px;
        background: linear-gradient(90deg, #05467c, #1e90ff);
        padding: 10px;
        display: flex;
        align-items: center;
        flex-wrap: wrap;
    }

    .otherlinks a {
        color: white;
    }

    .category-icon {
        width: 26px;
        height: 26px;
        margin-right: 8px;
        vertical-align: middle;
    }



.search-item {
        padding: 10px;
        border-bottom: 1px solid #ccc;
        cursor: pointer; 
    }

    .search-item a {
        text-decoration: none;
        color: #000;
    }

    .search-item:hover {
        background-color: #f1f1f1;
    }

</style>

<header>
    <div class="text-center bg-white border-bottom">
        <div class="px-5">
            <div class="row">
                <!-- Logo Section -->
                <div class="col-md-4 d-flex justify-content-center justify-content-md-start align-items-center mb-md-0">
                    <a href="<?php echo e(url('/')); ?>" class="d-flex align-items-center" style="text-decoration: none">
                        <div class="navbar-brand">
                            <img src="/assets/images/logo.png" height="60" width="40" alt="Logo" />
                        </div>
                        <img src="/assets/images/brand_name.png" height="27" width="290" alt="brand" />
                    </a>
                </div>

               <!-- Search Section -->
                <div class="col-md-5 mt-2">
                    <form class="d-flex input-group w-auto my-auto mb-md-0" id="search-form">
                        <input autocomplete="off" id="search" type="search" class="form-control rounded" placeholder="Search" style="width: 250px;" />
                        <span class="input-group-text border-0 d-none d-lg-flex" id="search-icon"><i class="fas fa-search"></i></span>
                    </form>
                    <div id="search-results" style="display:none; position:absolute; background:white; width:38%; border:1px solid #ccc; z-index: 1000;"></div>
                </div>


                <!-- User & Cart Section -->
                <div class="col-md-3 mb-2 d-flex justify-content-center justify-content-md-end align-items-center">
                    <div class="d-flex align-items-center">
                        <!-- Dropdown Menu -->
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

                        <!-- Shopping Cart -->
                        <a class="text-reset me-5" href="<?php echo e(route('shopping_cart')); ?>" style="position: relative;">
                            <span style="font-size: 19px; position: relative;">
                                <i class="fas fa-shopping-cart"></i>
                            </span>
                            <span id="cart-count" class="badge badge-danger">0</span>
                        </a>

                        <!-- User Authentication Links -->
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
                                <a id="navbarDropdown" class="text-reset dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <div class="icon-circle">
                                        <?php if(Auth::user()->profile_image): ?>
                                            <img src="<?php echo e(asset('storage/' . Auth::user()->profile_image)); ?>" style="width: 35px; height: 35px; border-radius: 50%; object-fit: cover;" class="profile_image">
                                        <?php else: ?>
                                            <span style="font-size: 17px;"><?php echo e(Auth::user()->name[0]); ?></span>
                                        <?php endif; ?>
                                    </div>
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
        </div>
    </div>

  <!-- Navbar Divider -->
<div class="navbar-divider w-100 p-0 mb-1">
    <div class="container d-flex justify-content-center align-items-center" style="width: 80%;">

        <div class="d-flex align-items-center" style="font-size: 16px;">

            <!-- All Categories Dropdown -->
            <div class="custom-dropdown me-4">
                <div class="dropdown-toggle" id="dropdownMenuButton" aria-expanded="false" style="font-size:15px;">
                    <i class="fas fa-bars me-2"></i> All Categories
                </div>
                <div class="dropdown-menu">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="dropdown-item dropdown-submenu">
                            <a href="<?php echo e(route('user_products', ['category' => $category->parent_category])); ?>">
                                <img src="<?php echo e(asset('storage/category_images/' . $category->image)); ?>" alt="<?php echo e($category->parent_category); ?> icon" class="category-icon">
                                <?php echo e($category->parent_category); ?>

                            </a>
                            <?php if($category->subcategories->isNotEmpty()): ?> 
                                <div class="dropdown-menu multi-column">
                                    <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="dropdown-column">
                                            <a href="<?php echo e(route('user_products', ['category' => $category->parent_category, 'subcategory' => $subcategory->subcategory])); ?>">
                                                <strong style="font-size:16px;"><?php echo e($subcategory->subcategory); ?></strong>
                                            </a>
                                            <?php if($subcategory->subSubcategories->isNotEmpty()): ?> 
                                                <?php $__currentLoopData = $subcategory->subSubcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subSubcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="<?php echo e(route('user_products', ['category' => $category->parent_category, 'subcategory' => $subcategory->subcategory, 'subsubcategory' => $subSubcategory->sub_subcategory])); ?>">
                                                        <?php echo e($subSubcategory->sub_subcategory); ?>

                                                    </a>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <!-- Other Links -->
            <div class="d-flex ms-4 d-none d-md-flex otherlinks" style="font-size:15px;">
                <a href="<?php echo e(route('all_items')); ?>" class="mx-3">All Items</a>
                <a href="<?php echo e(route('special_offerproducts')); ?>" class="mx-3">Special Offers</a>
                <a href="<?php echo e(route('sale_products')); ?>" class="mx-3">Flash Sale</a>
                <a href="<?php echo e(route('best_sellers')); ?>" class="mx-3">Bestsellers</a>
            </div>

            <!-- Dropdown for Other Links in Mobile View -->
            <div class="dropdown d-md-none otherlinks ms-4" style="font-size:15px;">
                <a class="dropdown-toggle" href="#" id="otherLinksDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Other
                </a>
                <ul class="dropdown-menu" aria-labelledby="otherLinksDropdown">
                    <li><a class="dropdown-item" href="<?php echo e(route('all_items')); ?>">All Items</a></li>
                    <li><a class="dropdown-item" href="<?php echo e(route('special_offerproducts')); ?>">Special Offers</a></li>
                    <li><a class="dropdown-item" href="<?php echo e(route('sale_products')); ?>">Flash Sale</a></li>
                    <li><a class="dropdown-item" href="<?php echo e(route('best_sellers')); ?>">Bestsellers</a></li>
                </ul>
            </div>
        </div>
    </div>
    </div>

</header>





<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>
                    <!-- Email Field -->
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
                    <!-- Password Field -->
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
                    <!-- Remember Me Checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                        <label class="form-check-label" for="remember"><?php echo e(__('Remember Me')); ?></label>
                    </div>
                    <!-- Forgot Password Link -->
                    <?php if(Route::has('password.request')): ?>
                        <div>
                            <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>"><?php echo e(__('Forgot Your Password?')); ?></a>
                        </div>
                    <?php endif; ?>
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100 mt-4 mb-3"><?php echo e(__('Login')); ?></button>
                </form>
                <!-- Social Login Options -->
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

<!-- Show Login Modal if Errors Exist -->
<?php if($errors->has('email') || $errors->has('password')): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
            loginModal.show();
        });
    </script>
<?php endif; ?>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#search').on('keyup', function(event) {
            var query = $(this).val();
            // Check if the query length is more than 2 characters
            if (query.length > 2) {
                $.ajax({
                    url: "<?php echo e(route('searchProducts')); ?>", // Route to handle search
                    type: "GET",
                    data: { search: query },
                    success: function(data) {
                        $('#search-results').empty().show(); // Clear previous results and show dropdown
                        if (data.length > 0) {
                            $.each(data, function(index, product) {
                                $('#search-results').append(
                                    '<div class="search-item" data-href="/product/' + product.product_id + '">' +
                                        product.product_name +
                                    '</div>'
                                );
                            });
                        } else {
                            $('#search-results').append('<div class="search-item">No products found</div>');
                        }
                    },
                    error: function() {
                        $('#search-results').empty().show();
                        $('#search-results').append('<div class="search-item">Error searching products</div>');
                    }
                });
            } else {
                $('#search-results').hide(); // Hide dropdown if query is too short
            }

            // Handle search submission on Enter key
            if (event.key === 'Enter') {
                window.location.href = "/search-results?query=" + encodeURIComponent(query);
            }
        });

        // Handle click event on the search icon
        $('#search-icon').on('click', function() {
            var query = $('#search').val();
            if (query.length > 2) {
                window.location.href = "/search-results?query=" + encodeURIComponent(query);
            }
        });

        // Hide results when clicking outside of the search input
        $(document).click(function(e) {
            if (!$(e.target).closest('#search, #search-results').length) {
                $('#search-results').hide();
            }
        });

        // Make entire search item clickable
        $('#search-results').on('click', '.search-item', function() {
            var href = $(this).data('href'); // Get the URL from the data attribute
            window.location.href = href; // Redirect to the product page
        });
    });
</script>


   
    





<?php /**PATH C:\xampp\htdocs\online-marketing\resources\views/includes/navbar.blade.php ENDPATH**/ ?>