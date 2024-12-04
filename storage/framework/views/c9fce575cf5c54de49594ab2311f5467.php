<?php $__env->startSection('dashboard-content'); ?>
<h3 class="py-2 px-2">Order History</h3>
<ul class="list-group">
    <li class="list-group-item">Order #12345 - <a href="<?php echo e(route('order-details')); ?>">View Details</a></li>
</ul>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\chint\OneDrive\Documents\GitHub\online-marketing\resources\views/order-history.blade.php ENDPATH**/ ?>