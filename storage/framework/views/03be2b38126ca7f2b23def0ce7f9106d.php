<?php $__env->startSection('content'); ?>

<style>
    .small-input {
        padding: 4px 8px;
        font-size: 12px;
    }
</style>  

<main style="margin-top: 58px">
    <div class="container pt-4 px-4"> 
        <h3 class="py-3">My Websites</h3>

        <div class="card mb-4">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-4 mb-2 d-flex align-items-center">
                        <h5 class="py-3" style="font-weight: bold;">Basic Information</h5>
                    </div>
                    <div class="col-md-8 d-flex justify-content-end">
                        <span class="filter-option me-3 text-primary" data-mdb-toggle="offcanvas" data-mdb-target="#offcanvasRight"  aria-controls="offcanvasRight" style="cursor: pointer;">
                            Edit
                        </span>
                    </div>
                     
                    <!-- edit sidebar-->
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header">
                            <h6 id="offcanvasRightLabel">Edit Basic Information</h6>
                            <button type="button" class="btn-close text-reset" data-mdb-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body" style="font-size:13px;">
                            <form id="editInfoForm" action="" method="POST">
                                <?php echo csrf_field(); ?>
                                <!-- Assuming only one customer is fetched, so using first() -->
                                <?php if($customer->isNotEmpty()): ?>
                                    <?php $customer = $customer->first(); ?>

                                    <div class="form-group mb-3">
                                        <label for="payeename" class="text-secondary">Payee Name</label>
                                        <input type="text" id="payeename" name="payeename" class="form-control small-input" value="<?php echo e($customer->name); ?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="loginemail" class="text-secondary">Login Email</label>
                                        <input type="email" id="loginemail" name="loginemail" class="form-control small-input" value="<?php echo e($customer->email); ?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="loginphone" class="text-secondary">Login Phone Number</label>
                                        <input type="text" id="loginphone" name="loginphone" class="form-control small-input" value="<?php echo e($customer->contactno); ?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="contactmail" class="text-secondary">Contact Email</label>
                                        <input type="email" id="contactmail" name="contactmail" class="form-control small-input" value="<?php echo e($customer->email); ?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="contactphone" class="text-secondary">Contact Phone Number</label>
                                        <input type="text" id="contactphone" name="contactphone" class="form-control small-input" value="<?php echo e($customer->contactno); ?>">
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-create">Submit</button>
                                <?php endif; ?>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <?php if($customer): ?>
                                <tr>
                                    <td><strong>Login email</strong><br><?php echo e($customer->email); ?></td>
                                    <td><strong>Password</strong><br>*********</td>
                                    <td><strong>Login phone number</strong><br><?php echo e($customer->contactno ?: '-'); ?></td>
                                    <td><strong>Contact email</strong><br><?php echo e($customer->email); ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Contact phone number</strong><br><?php echo e($customer->contactno ?: '-'); ?></td>
                                    <td><strong>Social media platform</strong><br>
                                        Instagram: <a href="<?php echo e($customer->instagram_url); ?>"><?php echo e($customer->instagram_url); ?></a><br>
                                        TikTok: <a href="<?php echo e($customer->tiktok_url); ?>"><?php echo e($customer->tiktok_url); ?></a>
                                    </td>
                                    <td><strong>Subscribe to the AliExpress Portals newsletter</strong><br>Not subscribed</td>
                                    <td><strong>Payee Name</strong><br><?php echo e($customer->name); ?></td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>  
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-4 mb-2 d-flex align-items-center">
                        <h5 class="py-3" style="font-weight: bold;">Site Information</h5>
                    </div>
                    <div class="col-md-8 d-flex justify-content-end">
                        <button class="btn btn-primary">Add Site</button>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="card" style="background-color: #f8f9fa; box-shadow: none;">
                        <div class="card-body">
                            <div class="d-flex justify-content-end">
                                <span class="filter-option me-3 text-primary">Edit</span>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                        <?php if(!empty($customer->promotion_method)): ?>
                                            <?php
                                                // Check if it's JSON and decode it
                                                $promotion_methods = is_string($customer->promotion_method) 
                                                                    ? json_decode($customer->promotion_method, true) 
                                                                    : $customer->promotion_method;
                                            ?>
                                            <?php if(is_array($promotion_methods)): ?>
                                                <ul>
                                                    <?php $__currentLoopData = $promotion_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li><?php echo e($method); ?></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            <?php else: ?>
                                                <p><?php echo e($promotion_methods); ?></p>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <p>No promotion methods available</p>
                                        <?php endif; ?>

                                            <td><strong>Channel Type</strong><br>Social</td>
                                            <td><strong>Site name</strong><br>-</td>
                                            <td><strong>Site URL</strong><br>-</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Category</strong><br>-</td>
                                            <td><strong>Traffic source area</strong><br>Sri Lanka</td>
                                            <td><strong>Description</strong><br>-</td>
                                            <td><strong></strong><br></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.affiliate_main.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\esupport_systems\online-marketing\resources\views/affiliate_dashboard/mywebsites_page.blade.php ENDPATH**/ ?>