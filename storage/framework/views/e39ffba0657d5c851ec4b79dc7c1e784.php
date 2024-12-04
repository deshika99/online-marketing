<?php $__env->startSection('dashboard-content'); ?>

<h3 class="py-2 px-2">Edit Profile</h3>
<div class="container p-4">
<form>
    <div class="mb-3">
        <label for="fullName" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="fullName" placeholder="Enter your full name">
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="Enter your email">
        </div>
        <div class="col-md-6 mb-3">
            <label for="mobile" class="form-label">Mobile</label>
            <input type="tel" class="form-control" id="mobile" placeholder="Enter your mobile number">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="birthday" class="form-label">Birthday</label>
            <input type="date" class="form-control" id="birthday">
        </div>
        <div class="col-md-6 mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select" id="gender">
                <option selected disabled>Select your gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
</form>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\chint\OneDrive\Documents\GitHub\online-marketing\resources\views/edit-profile.blade.php ENDPATH**/ ?>