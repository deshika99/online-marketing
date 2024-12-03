<?php $__env->startSection('dashboard-content'); ?>

<h3 class="py-2 px-2">Change Password</h3>
<div class="container p-3">
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <form action="<?php echo e(route('password.update')); ?>" method="POST">
    <?php echo csrf_field(); ?>
        
        <div class="mb-3 position-relative">
            <label for="current_password" class="form-label">Current Password</label>
            <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Current password">
            <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-danger"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        
        <div class="mb-3 position-relative">
            <label for="new_password" class="form-label">New Password</label>
            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New password">
            <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-danger"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        
        <div class="mb-3 position-relative">
            <label for="new_password_confirmation" class="form-label">Retype New Password</label>
            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" placeholder="Retype new password">
            <?php $__errorArgs = ['new_password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-danger"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        
        <button type="submit" class="btn btn-primary mt-3">Change Password</button>
    </form>
</div>


<script>
    document.querySelectorAll('.toggle-password').forEach(item => {
        item.addEventListener('click', function () {
            const input = document.querySelector(this.getAttribute('toggle'));
            if (input.type === 'password') {
                input.type = 'text';
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            } else {
                input.type = 'password';
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            }
        });
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\esupport_systems\online-marketing\resources\views/member_dashboard/change-password.blade.php ENDPATH**/ ?>