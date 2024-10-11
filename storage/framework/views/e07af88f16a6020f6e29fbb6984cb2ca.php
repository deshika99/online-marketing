

<?php $__env->startSection('content'); ?>
<style>
     .item-row {
        padding: 5px;
     }

     .item-icons a {
        font-size: 12px;
     }
     .cart-image {
        width: auto;
        height: 60px; 
        max-width: 100%;  
        object-fit: contain;  

     }
</style>

<div class="container mt-3 mb-5" style="width: 80%;">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page" id="breadcrumb-product">Shopping Cart</li>
        </ol>
    </nav>

    <section class="my-5">
        <div class="row gx-1">
            <?php if(auth()->guard()->check()): ?>
                <!-- cart -->
                <div class="col-lg-9">
                    <div class="shadow-0">
                        <div class="m-3">
                            <?php $__empty_1 = true; $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="row gy-2 mb-2 item-row" data-product-id="<?php echo e($item->product_id); ?>">
                                    <div class="col-lg-5 d-flex align-items-center">
                                        <input type="checkbox" class="form-check-input me-3">
                                        <img src="<?php echo e(asset('storage/' . $item->product->images->first()->image_path)); ?>" class="cart-image me-3"/>
                                        <div>
                                        <a href="<?php echo e(route('single_product_page', ['product_id' => $item->product_id])); ?>" class="nav-link mb-0" style="flex: 1;"><?php echo e($item->product->product_name); ?></a>
                                        <div class="d-flex align-items-center">
                                            <?php if($item->size): ?>
                                                <p class="text-muted me-3 mb-0">Size: <strong><?php echo e($item->size); ?></strong></p>
                                            <?php endif; ?>
                                            <?php if($item->color): ?>
                                                <p class="text-muted mb-0 d-flex align-items-center">
                                                    Color: 
                                                    <span style="display: inline-block; background-color: <?php echo e($item->color); ?>; border: 1px solid #e8ebec; height: 15px; width: 15px; border-radius: 50%; margin-left: 0.5rem;" 
                                                        title="<?php echo e($item->color); ?>"></span>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 d-flex flex-column align-items-start">
                                    <div class="d-flex flex-column align-items-start">
                                        <?php
                                            $salePrice = $item->product->sale ? $item->product->sale->sale_price : null;
                                            $specialOfferPrice = $item->product->specialOffer ? $item->product->specialOffer->offer_price : null;
                                            $normalPrice = $item->product->normal_price;
                                        ?>

                                        <?php if($salePrice): ?>
                                            <p class="text-orange h6 mt-3">
                                                Rs. <span class="item-price"><?php echo e(number_format($salePrice, 2)); ?></span>
                                            </p>
                                        <?php elseif($specialOfferPrice): ?>
                                            <p class="text-orange h6 mt-3">
                                                Rs. <span class="item-price"><?php echo e(number_format($specialOfferPrice, 2)); ?></span>
                                            </p>
                                        <?php else: ?>
                                            <p class="text-orange h6 mt-4">
                                                Rs. <span class="item-price"><?php echo e(number_format($normalPrice, 2)); ?></span>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                    <div class="col-lg-2 d-flex align-items-center justify-content-end">
                                        <div class="input-group quantity-input">
                                            <button class="btn btn-white button-minus" type="button">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <input type="text" class="form-control text-center quantity" id="quantity" value="<?php echo e($item->quantity); ?>" aria-label="Quantity" data-price="<?php echo e($item->product->specialOffer && $item->product->specialOffer->status === 'active' ? $item->product->specialOffer->offer_price : $item->product->normal_price); ?>" style="width: 50px;" />
                                            <button class="btn btn-white button-plus" type="button">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 d-flex align-items-center justify-content-end">
                                        <div class="d-flex item-icons">
                                            <a href="#!" class="btn btn-light btn-no-border icon-hover-primary"><i class="fas fa-heart fa-lg text-secondary"></i></a>
                                            <a href="#" class="btn btn-light btn-no-border icon-hover-danger btn-delete-item" data-product-id="<?php echo e($item->product_id); ?>"><i class="fas fa-trash fa-lg text-secondary"></i></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <p>No items in the cart</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- summary -->
                <div class="col-lg-3">
                    <div class="card summary-card mt-2">
                        <h5 class="p-4">Order Summary</h5>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">SubTotal (<?php echo e(count($cart)); ?> items):</p>
                                <p class="mb-2" id="subtotal">
                                    Rs. <?php echo e($cart->sum(fn($item) => 
                                        ($item->product->specialOffer && $item->product->specialOffer->status === 'active') 
                                        ? $item->product->specialOffer->offer_price 
                                        : $item->product->normal_price
                                    )); ?>

                                </p>
                            </div>
                            <hr />
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Total:</p>
                                <p class="mb-2 fw-bold" id="total" style="color:#f55b29;">
                                    Rs. <?php echo e($cart->sum(fn($item) => 
                                        ($item->product->specialOffer && $item->product->specialOffer->status === 'active') 
                                        ? $item->product->specialOffer->offer_price 
                                        : $item->product->normal_price
                                    )); ?>

                                </p>
                            </div>
                            <div class="mt-3">
                                <a href="<?php echo e(route('checkout')); ?>" class="btn btn-checkout w-100 shadow-0 mb-2"> Proceed To checkout </a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php else: ?>
            <div class="col-lg-12">
                <div class="card p-4 text-center">
                    <img src="assets/images/cart.png" style="width: 100px; display: block; margin: 0 auto;">
                    <h4 class="mt-3">Your cart is empty</h4>
                    <p>Sign in to view your cart and start shopping.</p>
                    <a href="<?php echo e(route('register')); ?>" class="btn btn-primary mx-auto d-block" style="width: 10%; background-color: black; border: black;">SIGN UP</a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>
</div>





<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // Update quantity and price
    $('.button-plus, .button-minus').on('click', function() {
        const quantityInput = $(this).siblings('.quantity');
        let currentValue = parseInt(quantityInput.val());
        
        if ($(this).hasClass('button-plus')) {
            quantityInput.val(currentValue + 1);
        } else if ($(this).hasClass('button-minus') && currentValue > 1) {
            quantityInput.val(currentValue - 1);
        }
        
        updatePrice($(this).closest('.item-row'));
    });

    function updatePrice(itemRow) {
        let subtotal = 0;
        $('.item-row').each(function() {
            const quantity = parseInt($(this).find('.quantity').val());
            // Get the price from data-price
            const price = parseFloat($(this).find('.quantity').data('price'));

            subtotal += quantity * price; // Update subtotal
        });

        $('#subtotal').text('Rs. ' + subtotal.toFixed(2));
        $('#total').text('Rs. ' + subtotal.toFixed(2));

        const productId = itemRow.data('product-id'); 
        const quantity = itemRow.find('.quantity').val();
        
        $.ajax({
            url: '<?php echo e(route('cart.update')); ?>',
            method: 'POST',
            data: {
                _token: "<?php echo e(csrf_token()); ?>",
                product_id: productId,
                quantity: quantity
            },
            success: function(response) {
                if (response.success) {
                    console.log(response.message);
                }
            },
            error: function(xhr) {
                console.log('Error updating quantity', xhr);
            }
        });
    }

    $('.btn-delete-item').on('click', function(e) {
        e.preventDefault();

        const productId = $(this).data('product-id'); 

        $.ajax({
            url: `<?php echo e(route('cart.remove', '')); ?>/${productId}`,
            method: 'DELETE',
            data: {
                _token: "<?php echo e(csrf_token()); ?>"
            },
            success: function(response) {
                location.reload(); 
            },
            error: function(xhr) {
                console.log(xhr.responseText); 
                alert('Something went wrong. Please try again.');
            }
        });
    });
});

</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\online-marketing\resources\views/shopping_cart.blade.php ENDPATH**/ ?>