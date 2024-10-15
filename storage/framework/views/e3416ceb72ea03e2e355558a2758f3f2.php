<style>
.list-group-item {
    border: none;
    padding: 5px 25px; 
}

#sidebarMenu {
    max-height: 100vh; 
    overflow-y: auto;  
    padding-bottom: 20px;
}
</style>

<nav id="sidebarMenu" class="collapse navbar-collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
        <div class="list-group list-group-flush mx-2 mt-4">
            <a href="<?php echo e(route('index')); ?>" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init aria-current="true">
                <span>Home</span>
            </a>
            <a href="<?php echo e(route('ad_center')); ?>" class="list-group-item list-group-item-action py-2 " data-mdb-ripple-init>
                <span>Ad Center</span>
            </a>
            <a href="<?php echo e(route('code_center')); ?>" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init>
                <span>Code Center</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action py-2 " data-mdb-ripple-init>
                <span>Incentive Campaign</span>
            </a>

            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action py-2" data-bs-toggle="collapse" data-bs-target="#reportsSubmenu" aria-expanded="false">
                    <span>Reports</span>
                    <i class="fas fa-chevron-down float-end mt-2" style="font-size:10px;"></i> 
                </a>
                <div class="collapse ms-3" id="reportsSubmenu">
                    <a href="<?php echo e(route('traffic_report')); ?>" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init>
                        Traffic Report 
                    </a>
                    <a href="<?php echo e(route('income_report')); ?>" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init>
                        Income Report 
                    </a>
                    <a href="<?php echo e(route('order_tracking')); ?>" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init>
                        Live Order Tracking
                    </a>
                    <a href="<?php echo e(route('transaction_product_report')); ?>" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init>
                        Transaction Product Report
                    </a>
                </div>
            </div>

            <a href="#" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init>
                <i class=""></i><span>Tools</span>
            </a>

            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action py-2" data-bs-toggle="collapse" data-bs-target="#paymentSubmenu" aria-expanded="false">
                    <span>Payment</span>
                    <i class="fas fa-chevron-down float-end mt-2" style="font-size:10px;"></i> 
                </a>
                <div class="collapse ms-3" id="paymentSubmenu">
                    <a href="<?php echo e(route('withdrawals')); ?>" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init>
                      Withdrawals
                    </a>
                    <a href="<?php echo e(route('account_balance')); ?>" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init>
                        Account Balance
                    </a>
                    <a href="" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init>
                        Payment Information
                    </a>
                    <a href="" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init>
                        Commission Rules
                    </a>
                </div>
            </div>

            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action py-2" data-bs-toggle="collapse" data-bs-target="#accountSubmenu" aria-expanded="false">
                    <span>Account</span>
                    <i class="fas fa-chevron-down float-end mt-2" style="font-size:10px;"></i> 
                </a>
                <div class="collapse ms-3" id="accountSubmenu">
                    <a href="<?php echo e(route('mywebsites_page')); ?>" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init>
                      My Websites
                    </a>
                    <a href="<?php echo e(route('tracking_id')); ?>" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init>
                        Tracking ID
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\online-marketing\resources\views/layouts/affiliate_main/sidebar.blade.php ENDPATH**/ ?>