<?php $__env->startSection('content'); ?>

<!-- Main layout -->
<main style="margin-top: 58px">
    <div class="container pt-4">

        <section class="mb-4">
            <div class="card">
                <div class="card-header text-center py-3">
                    <h5 class="mb-0 text-center"></h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive"></div>
                </div>
            </div>
        </section>

        <div class="row mb-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between p-md-1">
                            <div class="d-flex flex-row">
                                <div class="align-self-center">
                                    <i class="fas fa-pencil-alt text-info fa-3x me-4"></i>
                                </div>
                                <div>
                                    <h5 style="font-weight: bold;">Dashboard</h5>
                                </div>
                            </div> 
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover text-nowrap table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Account Number</th>
                                    <th scope="col">Withdrawal Amount</th>
                                    <th scope="col">Processing Fee</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Remark</th>
                                </tr>
                                </thead>
                                <tbody>
                                  <tr>  
                                  </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <p class="mb-3">Account Balance</p>
                        <h3 class="mb-4">LKR 0.00</h3>                  
                        <button class="btn btn-secondary">Withdraw</button>             
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="notifications-tab" data-bs-toggle="tab" href="#notifications" role="tab" aria-controls="notifications" aria-selected="true">Notifications</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="system-messages-tab" data-bs-toggle="tab" href="#system-messages" role="tab" aria-controls="system-messages" aria-selected="false">System Messages</a>
                            </li>
                        </ul>
                        
                        <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="notifications" role="tabpanel" aria-labelledby="notifications-tab">
                                <p class="mb-3">Recent notifications:</p>
                                <ul class="list-group">
                                    <li class="list-group-item">System update completed successfully</li>
                                    <li class="list-group-item">Scheduled maintenance at 2 AM</li>
                                    <li class="list-group-item"></li>
                                </ul>
                            </div>
                            
                            <div class="tab-pane fade" id="system-messages" role="tabpanel" aria-labelledby="system-messages-tab">
                                <p class="mb-3">Recent system messages:</p>
                                <ul class="list-group">
                                    <li class="list-group-item">System update completed successfully</li>
                                    <li class="list-group-item">Scheduled maintenance at 2 AM</li>
                                    <li class="list-group-item">New features added to your account</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <p class="mb-3">Account</p>
                        <h3 class="mb-4"></h3>                  
                        <button class="btn btn-secondary"></button>             
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.affiliate_main.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\online-marketing\resources\views/affiliate_dashboard/index.blade.php ENDPATH**/ ?>