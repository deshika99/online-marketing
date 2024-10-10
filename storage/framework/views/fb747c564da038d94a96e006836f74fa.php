<?php $__env->startSection('content'); ?>

<style>
    .table thead {
        background-color: #f9f9f9;
    }
</style>  

<main style="margin-top: 58px">
    <div class="container pt-4 px-4"> 
        <h3 class="py-3">Code Center</h3>

        <div class="card">
            <div class="card-body">
                <div class="tab-pane fade show active" role="tabpanel">
                    <div class="container mt-4 mb-4">
                        <div class="table-responsive">
                        <table class="table table-bordered">
    <thead>
        <tr>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Tracking ID</th>
            <th>Affiliate Link</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $affiliateLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $affiliateLink): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                <?php if($affiliateLink->product && $affiliateLink->product->images->isNotEmpty()): ?>
                        <img src="<?php echo e(asset('storage/' . $affiliateLink->product->images->first()->image_path)); ?>" alt="<?php echo e($affiliateLink->product->product_name); ?>" style="width: 100px; height: auto;">
                    <?php else: ?>
                        No Image
                    <?php endif; ?>
                </td>
                <td><?php echo e($affiliateLink->product->product_name ?? 'N/A'); ?></td>
                <td><?php echo e($affiliateLink->raffleTicket->token ?? 'N/A'); ?></td>
                <td>
                    <a href="<?php echo e($affiliateLink->link); ?>" target="_blank"><?php echo e($affiliateLink->link); ?></a>
                </td>
                <td>
                    <button class="btn btn-primary" onclick="copyToClipboard('<?php echo e($affiliateLink->link); ?>')">Copy</button>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Footer -->
            <div class="card-footer d-flex justify-content-between align-items-center">
                <!-- Items per page selection -->
                <div class="d-flex align-items-center">
                    <label for="items-per-page" class="form-label me-2 mb-0">Items per page:</label>
                    <select id="items-per-page" class="form-select items-per-page" style="font-size: 0.8rem; width: auto;">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                    </select>
                </div>

                <!-- Pagination controls -->
                <nav aria-label="Page navigation">
                    <ul class="pagination mb-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="#"><i class="fa-solid fa-arrow-left"></i></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="fa-solid fa-arrow-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</main>

<!-- Copy to Clipboard Functionality -->
<script>
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(function() {
            alert('Link copied to clipboard!');
        }, function(err) {
            alert('Could not copy text: ', err);
        });
    }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.affiliate_main.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\e support project\resources\views/affiliate_dashboard/code_center.blade.php ENDPATH**/ ?>