<?php $__env->startSection('content'); ?>
<style>
    .table thead {
        background-color: #f9f9f9; 
    }

    .btn-create {
        font-size: 0.8rem;
    }

    .modal-header {
        background-color: #f9f9f9;
    }

    .form-text {
        font-size: 0.8rem;
    }
</style>  

<main style="margin-top: 58px">

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="container pt-4 px-4"> 
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="py-3 mb-0">Tracking ID</h3>
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-primary btn-create" data-bs-toggle="modal" data-bs-target="#createTrackingIdModal">Create Tracking ID</button>
        </div>
        
        <div class="card">
            <div class="card-body">
                <div class="tab-pane fade show active" role="tabpanel">
                    <div class="container mt-4 mb-4">
                        <div class="table-responsive">
                            <table class="table table-hover text-nowrap table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Tracking ID</th>
                                        <th scope="col">Generation Time</th>
                                        <th scope="col">Operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $raffletickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($ticket->id); ?></td>
                                            <td><?php echo e($ticket->token); ?></td>
                                            <td><?php echo e($ticket->created_at); ?></td>
                                            <td>
                                                <form action="<?php echo e(route('raffletickets.setDefault', $ticket->id)); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('PUT'); ?>
                                                    <button type="submit" class="btn btn-sm btn-primary" <?php echo e($ticket->default ? 'disabled' : ''); ?>>
                                                        <?php echo e($ticket->default ? 'Default' : 'Set as Default'); ?>

                                                    </button>
                                                </form>
                                                <form action="<?php echo e(route('raffletickets.destroy', $ticket->id)); ?>" method="post" class="d-inline">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button class="btn btn-sm btn-danger mt-2">Delete</button>
                                                </form>

                                                <!-- View Report Button -->
                                                <a href="<?php echo e(route('raffletickets.report', $ticket->id)); ?>" class="btn btn-sm btn-info">View Report</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Footer -->
            <div class="card-footer d-flex justify-content-between align-items-center">
                <span>Total: <?php echo e($raffletickets->count()); ?></span>
                <!-- Pagination controls can be implemented here -->
            </div>
        </div>

    </div>
</main>


<!-- Create Tracking ID Modal -->
<div class="modal fade" id="createTrackingIdModal" tabindex="-1" aria-labelledby="createTrackingIdModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="trackingIdForm" action="<?php echo e(route('tracking_id_store')); ?>" method="post">
                <?php echo csrf_field(); ?> <!-- Laravel CSRF token -->
                <div class="modal-header">
                    <h5 class="modal-title" id="createTrackingIdModalLabel">Create Tracking ID</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="trackingIdInput" class="form-label">Tracking ID</label>
                        <input type="text" class="form-control" id="trackingIdInput" name="tracking_id" placeholder="Enter tracking ID" required>
                        <div class="form-text">
                            Please note that your tracking ID should contain only English letters, Arabic numerals, and the symbols ampersand (&), underscore (_) and hyphen (-).
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Tracking ID</button>
                </div>
            </form>
        </div>
    </div>
</div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.affiliate_main.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\e support project\resources\views/affiliate_dashboard/tracking_id.blade.php ENDPATH**/ ?>