<?php $__env->startSection('content'); ?>
<style>
    .table thead {
        background-color: #9FC5E8;
    }
    h3{
        text-align:center;
    }
    p{
        text-align:center;
    }
    .section{
        padding:30px;
    }
    .btun{
        align:center;
    }
    .card {
        padding: 10px;
        border: 20px;
        margin-left: 40px;
        margin-right: 40px;
    }

   .btn-primary {
        padding: 8px 15px;
        font-size: 14px;
    }

    .card h3 {
        font-size: 20px;
    }

    .card p {
        font-size: 14px;
    }
</style>

<main style="">
    <div class="container pt-4 px-4">
        <h2 class="py-3">Payment Information</h2>
    <br><br>
        
        <div class="card m-0 ">
            <div class="section">
                <?php if($customer && $customer->account_number): ?>
                    <!-- Show Payment Details -->
                    <h3>Bank Account Details</h3>
                    <p>Bank Name: <?php echo e($customer->bank_name); ?></p>
                    <p>Branch: <?php echo e($customer->branch); ?></p>
                    <p>Account Halder Name: <?php echo e($customer->account_name); ?></p>
                    <p>Account Number: <?php echo e($customer->account_number); ?></p>
                <?php else: ?>
                    <!-- No Payment Information -->
                    <h3>Bank Account Not Linked</h3>
                    <p>You have not linked any bank account</p>
                <?php endif; ?>
                <br><br>
            </div>    

            <div style="display: flex; justify-content: center;">
                <a href="<?php echo e(route('bank_acc')); ?>" class="btn btn-secondary btn-sm">UPDATE BANK ACCOUNT</a>
            </div>
        </div>
    </div>
</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.affiliate_main.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\online-marketing\resources\views/affiliate_dashboard/payment_info.blade.php ENDPATH**/ ?>