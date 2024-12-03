<?php $__env->startSection('content'); ?>
<style>
    .rule-card {
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .rule-card-body {
        padding: 15px;
        padding-bottom: 0px;
    }
    .rule-title {
        font-size: 1.1rem;
        font-weight: bold;
        color: #007bff;
        margin-bottom: 2px;
    }
    .rule-description {
        font-size: 0.95rem;
        color: #555;
    }
</style>  

<main style="margin-top: 58px">
    <div class="container pt-4 px-4"> 
        <h3 class="py-3">Affiliate Rules</h3>
        <div class="row">
            <?php $__currentLoopData = $rules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-12">
                    <div class="rule-card">
                        <div class="rule-card-body">
                            <div class="rule-title">Rule #<?php echo e($loop->iteration); ?></div>
                            <p class="rule-description"><?php echo e($rule->rule); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.affiliate_main.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\online-marketing\resources\views/affiliate_dashboard/affiliate_rules.blade.php ENDPATH**/ ?>