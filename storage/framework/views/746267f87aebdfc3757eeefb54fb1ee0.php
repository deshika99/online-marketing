<?php $__env->startSection('content'); ?>
<style>
.search-items {
    text-align: center;
    padding: 5px; 
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    box-sizing: border-box;
    margin-bottom: 15px;
    width: 110%; /* Changed from 110% to 100% */
}

.search .row {
    display: flex;
    justify-content: flex-start;
    flex-wrap: wrap;
}

.search-items:hover {
    border: 1px solid #e1e1e1;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); 
}

.search-items a {
    text-decoration: none;
    color: black;
}

.search-items img {
    width: 100%;
    height: auto;
    object-fit: cover;
    margin-bottom: 5px;
}

.search-image-wrapper {
    width: 100%;
    height: 300px; 
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
}

.search-image-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover; 
}

.search-items h6 {
    text-align: left;
    font-size: 15px; 
    margin: 2px 0;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.search-items .price {
    text-align: left;
    color: orange;
    font-size: 15px; 
    font-weight: bold;
}
</style>

<div class="container mt-4">
    <h6>Search Results for: "<?php echo e($query); ?>"</h6>

    <div class="search row mt-3" style="width: 100%;">
        <?php if($products->isEmpty()): ?>
            <div class="col-12">
                <p>No products found.</p>
            </div>
        <?php else: ?>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-2 col-sm-2 col-md-2 mb-3">
                    <div class="search-items position-relative">
                        <a href="<?php echo e(route('single_product_page', ['product_id' => $product->product_id])); ?>" class="d-block text-decoration-none">
                            <div class="search-image-wrapper position-relative">
                                <?php if($product->images->isNotEmpty()): ?>
                                    <img src="<?php echo e(asset('storage/' . $product->images->first()->image_path)); ?>" alt="Product Image" class="img-fluid">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('storage/default-image.jpg')); ?>" alt="Default Image" class="img-fluid">
                                <?php endif; ?>
                            </div>
                            <h6 class="product-name"><?php echo e(\Illuminate\Support\Str::limit($product->product_name, 24, '...')); ?></h6>
                            <div class="price">
                                    <?php if($product->sale && $product->sale->status === 'active'): ?>
                                        <span class="sale-price">Rs. <?php echo e(number_format($product->sale->sale_price, 2)); ?></span>
                                    <?php elseif($product->specialOffer && $product->specialOffer->status === 'active'): ?>
                                        <span class="offer-price">Rs. <?php echo e(number_format($product->specialOffer->offer_price, 2)); ?></span>
                                    <?php else: ?>
                                        Rs. <?php echo e(number_format($product->normal_price, 2)); ?>

                                    <?php endif; ?>
                                </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\online-marketing\resources\views/search_results.blade.php ENDPATH**/ ?>