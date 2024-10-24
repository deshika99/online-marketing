<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


<?php $__env->startSection('content'); ?>
<style>
    .submit-btn {
        display: flex;
        justify-content: flex-start;
    }

    .modal-content {
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .modal-header .modal1{
        background-color: #f1f1f1;
        border-bottom: 1px solid #ddd;
    }

    .modal-footer {
        border-top: 1px solid #ddd;
    }

    .btn-secondary {
        background-color: #6c757d;
        border: none;
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



        <header>
            <div class="text-center bg-white border-bottom" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                <div class="px-5">
                    <div class="row">
                    <div class="col-md-4 d-flex justify-content-center justify-content-md-start align-items-center mb-md-0">
                        <a href="<?php echo e(url('/home/affiliate/affiliate_home')); ?>" class="d-flex align-items-center" style="text-decoration: none">
                            <div class="navbar-brand">
                                <img src="/assets/images/logo.png" height="70" width="40" alt="Logo"/>
                            </div>
                            <img src="/assets/images/brand_name.png" height="30" width="320" alt="brand"/>
                        </a>
                    </div>

                        <div class="col-md-5 p-3">
                            <form class="d-flex input-group w-auto my-auto mb-3 mb-md-0">
                                <input autocomplete="off" type="search" class="form-control rounded" placeholder="Search" />
                                <span class="input-group-text border-0 d-none d-lg-flex"><i class="fas fa-search"></i></span>
                            </form>
                        </div>

                        <div class="col-md-3 d-flex justify-content-center justify-content-md-end align-items-center">
                            <div class="d-flex align-items-center">                      
                                    <a class="text-reset me-3 signup-btn p-2" href="#" data-bs-toggle="modal" data-bs-target="#affloginModal">
                                        <div style="font-weight:500; color:white">
                                           LOGIN
                                        </div>
                                    </a>
                                <div class="dropdown me-3">
                                    <a id="navbarDropdown" class="text-reset dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</header>


 
<div class="container mt-4 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-3">

            <h2 class="text-center mb-4 mt-3">Create Your Affiliate Account</h2>

            <div class="card register-card mt-3">
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('aff_reg')); ?>">
                        <?php echo csrf_field(); ?>

                      <h4>Basic Information</h4>
                        <br><br>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-start">Name <span class="text-danger"> *</span></label>
n
                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>
                                <?php $__errorArgs = ['name'];
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
                        </div>
                        <div class="row mb-3">

                            <label for="address" class="col-md-4 col-form-label text-md-start">Address <span class="text-danger"> *</span></label>

                            <div class="col-md-7">
                                <input id="address" type="text" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="address" value="<?php echo e(old('address')); ?>" required autocomplete="address">
                                <?php $__errorArgs = ['address'];
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
                        </div>
                        <div class="row mb-3">

                            <label for="district" class="col-md-4 col-form-label text-md-start">District <span class="text-danger"> *</span></label>

                            <div class="col-md-7">
                                <input id="district" type="text" class="form-control <?php $__errorArgs = ['district'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="district" value="<?php echo e(old('district')); ?>" required autocomplete="district">
                                <?php $__errorArgs = ['district'];
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
                        </div>
                        <div class="row mb-3">

                            <label for="dob-day" class="col-md-4 col-form-label text-md-start">Date Of Birth <span class="text-danger"> *</span></label>
                            <div class="col-md-7 d-flex">

                              
                                <input id="dob-day" type="number" class="form-control me-2 <?php $__errorArgs = ['dob_day'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="dob_day" value="<?php echo e(old('dob_day')); ?>" placeholder="Day" required>
                                <?php $__errorArgs = ['dob_day'];
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

                                
                                <input id="dob-month" type="number" class="form-control me-2 <?php $__errorArgs = ['dob_month'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="dob_month" value="<?php echo e(old('dob_month')); ?>" placeholder="Month" required>
                                <?php $__errorArgs = ['dob_month'];
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

                                
                                <input id="dob-year" type="number" class="form-control <?php $__errorArgs = ['dob_year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="dob_year" value="<?php echo e(old('dob_year')); ?>" placeholder="Year" required>
                                <?php $__errorArgs = ['dob_year'];
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
                        </div>

                        <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-start">Gender <span class="text-danger"> *</span></label>

                            <div class="col-md-7">
                                <select class="form-select <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="gender" name="gender">
                                    <option selected disabled>Select Gender</option>
                                    <option value="male" <?php echo e(old('gender') == 'male' ? 'selected' : ''); ?>>Male</option>
                                    <option value="female" <?php echo e(old('gender') == 'female' ? 'selected' : ''); ?>>Female</option>
                                    <option value="other" <?php echo e(old('gender') == 'other' ? 'selected' : ''); ?>>Other</option>
                                </select>
                                <?php $__errorArgs = ['gender'];
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
                        </div>

                        <div class="row mb-3">

                            <label for="email" class="col-md-4 col-form-label text-md-start">Email Address <span class="text-danger"> *</span></label>
                            <div class="col-md-7">

                                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email">
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
                        </div>
                        <div class="row mb-3">

                            <label for="phone_num" class="col-md-4 col-form-label text-md-start">Phone Number <span class="text-danger"> *</span></label>

                            <div class="col-md-7">
                                <input id="phone_num" type="text" class="form-control <?php $__errorArgs = ['phone_num'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="phone_num" value="<?php echo e(old('phone_num')); ?>" required autocomplete="phone_num">
                                <?php $__errorArgs = ['phone_num'];
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
                        </div>
                        <div class="row mb-3">

                            <label for="NIC" class="col-md-4 col-form-label text-md-start">NIC <span class="text-danger"> *</span></label>

                            <div class="col-md-7">
                                <input id="NIC" type="text" class="form-control <?php $__errorArgs = ['NIC'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="NIC" value="<?php echo e(old('NIC')); ?>" required autocomplete="NIC">
                                <?php $__errorArgs = ['NIC'];
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
                        </div>
                        <div class="row mb-3">

                            <label for="password" class="col-md-4 col-form-label text-md-start">Password <span class="text-danger"> *</span></label>

                            <div class="col-md-7">
                                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password">
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
                        </div>
                        <div class="row mb-5">

                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-start">Confirm Password <span class="text-danger"> *</span></label>

                            <div class="col-md-7">
                                <input id="password_confirmation" type="password" class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password_confirmation" required autocomplete="new-password">
                                <?php $__errorArgs = ['password_confirmation'];
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
                        </div>


                        <br>
                        <hr>
                        <br>

                        <h4>Promotional Methods</h4>
                        <br><br>


                        <!-- Promotion Method -->
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-start">Promotion Method</label>
                            <div class="col-md-7">
                                <div class="form-check">
                                    <input class="form-check-input <?php $__errorArgs = ['promotion_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="checkbox" name="promotion_method[]" value="Instagram" id="instagram" <?php echo e(is_array(old('promotion_method')) && in_array('Instagram', old('promotion_method')) ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="instagram">Instagram</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input <?php $__errorArgs = ['promotion_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="checkbox" name="promotion_method[]" value="Facebook" id="facebook" <?php echo e(is_array(old('promotion_method')) && in_array('Facebook', old('promotion_method')) ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="facebook">Facebook</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input <?php $__errorArgs = ['promotion_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="checkbox" name="promotion_method[]" value="TikTok" id="tiktok" <?php echo e(is_array(old('promotion_method')) && in_array('TikTok', old('promotion_method')) ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="tiktok">TikTok</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input <?php $__errorArgs = ['promotion_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="checkbox" name="promotion_method[]" value="YouTube" id="youtube" <?php echo e(is_array(old('promotion_method')) && in_array('YouTube', old('promotion_method')) ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="youtube">YouTube</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input <?php $__errorArgs = ['promotion_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="checkbox" name="promotion_method[]" value="Content website/blog" id="content_website" <?php echo e(is_array(old('promotion_method')) && in_array('Content website/blog', old('promotion_method')) ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="content_website">Content website/blog</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input <?php $__errorArgs = ['promotion_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="checkbox" name="promotion_method[]" value="WhatsApp" id="whatsapp" <?php echo e(is_array(old('promotion_method')) && in_array('WhatsApp', old('promotion_method')) ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="whatsapp">Through WhatsApp groups and status</label>
                                </div>
                                <?php $__errorArgs = ['promotion_method'];
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
                        </div>


                        <!-- Instagram Profile URL -->
                        <div class="row mb-3">
                            <label for="instagram_url" class="col-md-4 col-form-label text-md-start">Instagram Profile URL</label>
                            <div class="col-md-7">
                                <input id="instagram_url" type="url" class="form-control <?php $__errorArgs = ['instagram_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="instagram_url" value="<?php echo e(old('instagram_url')); ?>" autocomplete="instagram_url">
                                <?php $__errorArgs = ['instagram_url'];
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
                        </div>

                        <!-- Facebook Page URL -->
                        <div class="row mb-3">
                            <label for="facebook_url" class="col-md-4 col-form-label text-md-start">Facebook Page URL</label>
                            <div class="col-md-7">
                                <input id="facebook_url" type="url" class="form-control <?php $__errorArgs = ['facebook_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="facebook_url" value="<?php echo e(old('facebook_url')); ?>" autocomplete="facebook_url">
                                <?php $__errorArgs = ['facebook_url'];
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
                        </div>

                        <!-- TikTok Profile URL -->
                        <div class="row mb-3">
                            <label for="tiktok_url" class="col-md-4 col-form-label text-md-start">TikTok Profile URL</label>
                            <div class="col-md-7">
                                <input id="tiktok_url" type="url" class="form-control <?php $__errorArgs = ['tiktok_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="tiktok_url" value="<?php echo e(old('tiktok_url')); ?>" autocomplete="tiktok_url">
                                <?php $__errorArgs = ['tiktok_url'];
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
                        </div>

                        <!-- YouTube Channel URL -->
                        <div class="row mb-3">
                            <label for="youtube_url" class="col-md-4 col-form-label text-md-start">YouTube Channel URL</label>
                            <div class="col-md-7">
                                <input id="youtube_url" type="url" class="form-control <?php $__errorArgs = ['youtube_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="youtube_url" value="<?php echo e(old('youtube_url')); ?>" autocomplete="youtube_url">
                                <?php $__errorArgs = ['youtube_url'];
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
                        </div>

                        <!-- Content Website/Blog URL -->
                        <div class="row mb-3">
                            <label for="content_website_url" class="col-md-4 col-form-label text-md-start">Content Website/Blog URL</label>
                            <div class="col-md-7">
                                <input id="content_website_url" type="url" class="form-control <?php $__errorArgs = ['content_website_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="content_website_url" value="<?php echo e(old('content_website_url')); ?>" autocomplete="content_website_url">
                                <?php $__errorArgs = ['content_website_url'];
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
                        </div>

                        <!-- Content whatsapp Group URL -->
                        <div class="row mb-3">
                            <label for="content_whatsapp_url" class="col-md-4 col-form-label text-md-start">Content Whatsapp Group URL</label>
                            <div class="col-md-7">
                                <input id="content_whatsapp_url" type="url" class="form-control <?php $__errorArgs = ['content_whatsapp_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="content_whatsapp_url" value="<?php echo e(old('content_whatsapp_url')); ?>" autocomplete="content_whatsapp_url">
                                <?php $__errorArgs = ['content_whatsapp_url'];
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
                        </div>

                        <br>
                        <hr>
                        <br>

                        <h4>Payment Informations</h4>
                        <br><br>

                        <!-- Bank Name -->
                        <div class="row mb-3">
                            <label for="bank_name" class="col-md-4 col-form-label text-md-start">Bank Name<span class="text-danger"> *</span></label>
                            <div class="col-md-7">
                                <input id="bank_name" type="text" class="form-control <?php $__errorArgs = ['bank_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="bank_name" value="<?php echo e(old('bank_name')); ?>" required autocomplete="bank_name">
                                <?php $__errorArgs = ['bank_name'];
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
                        </div>

                        <!-- Branch -->
                        <div class="row mb-3">
                            <label for="branch" class="col-md-4 col-form-label text-md-start">Branch<span class="text-danger"> *</span></label>
                            <div class="col-md-7">
                                <input id="branch" type="text" class="form-control <?php $__errorArgs = ['branch'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="branch" value="<?php echo e(old('branch')); ?>" required autocomplete="branch">
                                <?php $__errorArgs = ['branch'];
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
                        </div>

                        <!-- Account Name -->
                        <div class="row mb-3">
                            <label for="account_name" class="col-md-4 col-form-label text-md-start">Account Name<span class="text-danger"> *</span></label>
                            <div class="col-md-7">
                                <input id="account_name" type="text" class="form-control <?php $__errorArgs = ['account_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="account_name" value="<?php echo e(old('account_name')); ?>" required autocomplete="account_name">
                                <?php $__errorArgs = ['account_name'];
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
                        </div>

                        <!-- Account Number -->
                        <div class="row mb-3">
                            <label for="account_number" class="col-md-4 col-form-label text-md-start">Account Number<span class="text-danger"> *</span></label>
                            <div class="col-md-7">
                                <input id="account_number" type="text" class="form-control <?php $__errorArgs = ['account_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="account_number" value="<?php echo e(old('account_number')); ?>" required autocomplete="account_number">
                                <?php $__errorArgs = ['account_number'];
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
                        </div>

                        <br>

                        <!-- Agree to Terms of Service and Privacy Policy -->
                        <div class="row mb-3">
                            <div class="col-md-7 ">
                                <div class="form-check">
                                    <input class="form-check-input <?php $__errorArgs = ['terms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="checkbox" name="terms" id="terms" <?php echo e(old('terms') ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="terms">
                                        I agree to the <a href="/terms" target="_blank">Terms of Service</a> and <a href="/privacy" target="_blank">Privacy Policy</a>.
                                    </label>
                                </div>
                                <?php $__errorArgs = ['terms'];
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
                        </div>

                        <br>

                        <div class="row submit-btn mb-0">
                            <div class="col-md-7 offset-md-0.5">
                                <button type="submit" class="btn btn-warning">Register As Affiliate</button>




                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Login Modal -->
<div class="modal fade" id="affloginModal" tabindex="-1" aria-labelledby="affloginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="affloginModalLabel">Login for Affiliate</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('aff_login')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email Address<i class="text-danger">*</i></label>
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

                    <div class="form-group">
                        <label for="password" class="form-label">Password<i class="text-danger">*</i></label>
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

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary submit-button mt-2">
                            Sign In
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Login Modal -->

<?php if($errors->has('email') || $errors->has('password')): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var affloginModal = new bootstrap.Modal(document.getElementById('affloginModal'));
            affloginModal.show();
        });
    </script>
<?php endif; ?>


<!-- Pending Modal -->
<div class="modal fade" id="pendingModal" tabindex="-1" aria-labelledby="pendingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header modal1">
                <h5 class="modal-title" id="pendingModalLabel">Registration Under Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="/assets/images/images.png" width="80px" alt="Review Image" class="mb-3">
                <p style="color:blue">Your registration is under review, please wait.<br>This may take 2-3 days.</p>
            </div>
        </div>
    </div>
</div>


<!-- Rejected Modal -->
<div class="modal fade" id="rejectedModal" tabindex="-1" aria-labelledby="rejectedModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header modal1">
                <h5 class="modal-title" id="rejectedModalLabel">Registration Rejected</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="color:red">
                Unfortunately, your registration has been rejected.
            </div>
        </div>
    </div>
</div>

<?php if(session('status1') === 'pending'): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var pendingModal = new bootstrap.Modal(document.getElementById('pendingModal'));
            pendingModal.show();
        });
    </script>
<?php elseif(session('status1') === 'rejected'): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var rejectedModal = new bootstrap.Modal(document.getElementById('rejectedModal'));
            rejectedModal.show();
        });
    </script>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\online-marketing\resources\views/aff_reg.blade.php ENDPATH**/ ?>