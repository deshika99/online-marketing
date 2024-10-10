<style>
    .navbar-divider {
    height: 40px;
    background: linear-gradient(90deg, #05467c, #1e90ff);
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
                        <a href="<?php echo e(url('/')); ?>" class="d-flex align-items-center" style="text-decoration: none">
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
                                        <div  style="font-weight:500">
                                           LOGIN
                                        </div>
                                        <?php if(Route::has('register')): ?>
                                            <a class="signup-btn p-2" href="<?php echo e(route('register')); ?>" style="">
                                                SIGN UP
                                            </a>
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
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="<?php echo e(route('dashboard')); ?>" style="font-size: 15px;">
                                            <?php echo e(__('My Profile')); ?>

                                        </a>

                                        <!-- Logout link -->
                                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="font-size: 15px;">
                                            <?php echo e(__('Logout')); ?>

                                        </a>
                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </div>
                                </div>
                                <?php endif; ?>

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
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           <!-- Navbar Divider -->
        <div class="navbar-divider w-100 p-0">
                <div class="container d-flex justify-content-center align-items-center" style="width: 50%;">
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
                    <div class="d-flex justify-content-center align-items-center flex-grow-1 otherlinks">
                        <a href="<?php echo e(route('all_items')); ?>" class="mx-3">All Items</a>
                        <a href="<?php echo e(route('special_offerproducts')); ?>" class="mx-3">Special Offers</a>
                        <a href="<?php echo e(route('sale_products')); ?>" class="mx-3">Flash Sale</a>
                        <a href="<?php echo e(route('best_sellers')); ?>" class="mx-3">Bestsellers</a>
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





<?php /**PATH D:\e support project\resources\views/includes/navbar.blade.php ENDPATH**/ ?>