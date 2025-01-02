<form action="<?php echo e(route('password_update')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="token" value="<?php echo e($token); ?>">
    <label for="email">Email</label>
    <input type="email" id="email" name="email" required>
    <label for="password">New Password</label>
    <input type="password" id="password" name="password" required>
    <label for="password_confirmation">Confirm Password</label>
    <input type="password" id="password_confirmation" name="password_confirmation" required>
    <button type="submit">Reset Password</button>
</form>
<?php if($errors->any()): ?>
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php endif; ?>
<?php /**PATH C:\Users\chint\OneDrive\Documents\GitHub\online-marketing\resources\views/auth/reset-password.blade.php ENDPATH**/ ?>