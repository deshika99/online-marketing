<!-- resources/views/products/search_results.blade.php -->


<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Search Results for "<?php echo e($searchQuery); ?>"</h1>

        <?php if($product->isEmpty()): ?>
            <p>No products found.</p>
        <?php else: ?>
            <div class="row">
                <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="<?php echo e(asset('storage/' . $product->image)); ?>" class="card-img-top" alt="<?php echo e($product->product_name); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo e($product->product_name); ?></h5>
                                <p class="card-text"><?php echo e($product->product_description); ?></p>
                                <p class="card-text"><strong>Price: $<?php echo e($product->price); ?></strong></p>
                                <a href="#" class="btn btn-primary">View Product</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\online-marketing\resources\views/admin_dashboard/search_results.blade.php ENDPATH**/ ?>