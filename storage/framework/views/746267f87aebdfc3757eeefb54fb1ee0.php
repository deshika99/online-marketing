<!-- resources/views/products/search_results.blade.php -->


<?php $__env->startSection('content'); ?>
    <h1>Search Results for "<?php echo e($searchQuery); ?>"</h1>

    <?php if($product->isEmpty()): ?>
        <p>No products found.</p>
    <?php else: ?>
        <div class="product-list">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="product-item">
                    <h2><?php echo e($product->product_name); ?></h2>
                    <p><?php echo e($product->product_description); ?></p>
                    <p><?php echo e($product->product_category); ?></p>
                    <p>Price: $<?php echo e($product->nomal_price); ?></p>
                    <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="<?php echo e($product->product_name); ?>">
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\online-marketing\resources\views/search_results.blade.php ENDPATH**/ ?>