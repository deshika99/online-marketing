<form action="<?php echo e(route('password.email')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <label for="email">Email</label>
    <input type="email" id="email" name="email" required>
    <button type="submit">Send Password Reset Link</button>
</form>
<?php if(session('status')): ?>
    <p><?php echo e(session('status')); ?></p>
<?php endif; ?>
<?php if($errors->any()): ?>
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php endif; ?>
<?php /**PATH C:\Users\chint\OneDrive\Documents\GitHub\online-marketing\resources\views/auth/forgot-password.blade.php ENDPATH**/ ?>