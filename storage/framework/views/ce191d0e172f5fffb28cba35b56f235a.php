<?php $__env->startSection('content'); ?>

<style>
      
</style>



<!--dresses-->
<div class="container mt-4 mb-5">
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dress</li>
        </ol>
    </nav>

        <div class="products">
            <div class="row mt-3">
                <div class="col-md-3">
                <div class="products-item">
                    <a href="<?php echo e(route('single_product_page', [
                        'title' => 'Party Dress for girl 01',
                        'image' => '/assets/images/dress1.png',
                        'price' => 3900
                    ])); ?>">
                        <img src="/assets/images/dress1.png" alt="Product 1">
                        <h5>Party Dress for girl 01</h5>
                        <div class="price">Rs.3900</div>
                    </a>
                </div>

                </div>
                <div class="col-md-3">
                    <div class="products-item">
                    <a href="<?php echo e(route('single_product_page', [
                        'title' => 'Party Dress for girl',
                        'image' => '/assets/images/dress2.png',
                        'price' => 3500
                    ])); ?>">
                        <img src="/assets/images/dress2.png" alt="Product 1">
                        <h5>Party Dress for girl</h5>
                        <div class="price">Rs.3500</div>
                    </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="products-item">
                        <img src="/assets/images/dress3.png" alt="Product 3">
                        <h5>Party Dress for girl</h5>
                        <div class="price">Rs.5500</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="products-item">
                        <img src="/assets/images/dress4.png" alt="Product 4">
                        <h5>Party Dress for girl</h5>
                        <div class="price">Rs.3200</div>
                    </div>
                </div>
            </div>
        </div>



    <div class="row-divider"></div>
   

    <div class="products">
        <div class="row mt-5 mb-5">
            <div class="col-md-3">
                <div class="products-item">
                    <img src="/assets/images/dress1.png" alt="Product 1">
                    <h5>Party Dress for girl</h5>
                    <div class="price">Rs.3500</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="products-item">
                    <img src="/assets/images/dress2.png" alt="Product 2">
                    <h5>Party Dress for girl</h5>
                    <div class="price">Rs.4200</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="products-item">
                    <img src="/assets/images/dress3.png" alt="Product 3">
                    <h5>Party Dress for girl</h5>
                    <div class="price">Rs.5500</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="products-item">
                    <img src="/assets/images/dress4.png" alt="Product 4">
                    <h5>Party Dress for girl</h5>
                    <div class="price">Rs.3200</div>
                </div>
            </div>
        </div>
    </div>
    
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\online-marketing\resources\views/dress.blade.php ENDPATH**/ ?>