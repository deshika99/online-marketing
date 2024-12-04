<?php $__env->startSection('content'); ?>
<style>
     .item-row{
        padding:5px;
     }

     .item-icons a{
        font-size: 12px;
     }
</style>

<div class="container mt-3 mb-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page" id="breadcrumb-product">Shopping Cart</li>
        </ol>
    </nav>

    <section class="my-5">
        <div class="row gx-1">
            <!-- cart -->
            <div class="col-lg-9">
                <div class="shadow-0">
                    <div class="m-3">
                        <?php $__empty_1 = true; $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="row gy-2 mb-2 item-row">
                            <div class="col-lg-7 d-flex align-items-center"> 
                                <input type="checkbox" class="form-check-input me-3">
                                <img src="<?php echo e($item['image'] ?? '/path/to/default-image.jpg'); ?>" class="border rounded me-3" style="width: 60px; height: 80px;" />
                                <div>
                                    <a href="#" class="nav-link" style="font-weight: bold; margin-bottom: 0.5rem;"><?php echo e($item['title']); ?></a>
                                    <p class="text-muted" style="margin: 0;"></p>
                                </div>
                            </div>
                            <div class="col-lg-2 d-flex flex-column align-items-start">
                                <div class="d-flex flex-column align-items-start">
                                    <p class="text-orange h6 mb-1 mt-3">Rs. <span class="item-price"><?php echo e($item['price']); ?></span></p>
                                    <div class="d-flex item-icons">
                                        <a href="#!" class="btn btn-light btn-no-border icon-hover-primary"><i class="fas fa-heart fa-lg text-secondary"></i></a>
                                        <a href="#" class="btn btn-light btn-no-border icon-hover-danger btn-delete-item" 
                                        data-index="<?php echo e($index); ?>"><i class="fas fa-trash fa-lg text-secondary"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 d-flex align-items-center justify-content-end">
                                <div class="input-group quantity-input">
                                    <button class="btn btn-white button-minus" type="button">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <input type="text" class="form-control text-center quantity" id="quantity" value="1" aria-label="Quantity" data-price="<?php echo e($item['price']); ?>" style="width: 50px;" />
                                    <button class="btn btn-white button-plus" type="button">
                                        <i class="fas fa-plus"></i>
                                    </button>
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
                            <p class="mb-2" id="subtotal">Rs. <?php echo e(array_sum(array_column($cart, 'price'))); ?></p>
                        </div>                       
                        <hr />
                        <div class="d-flex justify-content-between">
                            <p class="mb-2">Total:</p>
                            <p class="mb-2 fw-bold" id="total" style="color:#f55b29;">Rs. <?php echo e(array_sum(array_column($cart, 'price'))); ?></p>
                        </div>
                        <div class="mt-3">
                            <a href="<?php echo e(route('checkout')); ?>" class="btn btn-checkout w-100 shadow-0 mb-2"> Proceed To checkout </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Update quantity and price
    $('.button-plus').on('click', function() {
        const quantityInput = $(this).siblings('.quantity');
        const price = parseFloat(quantityInput.data('price'));
        let currentValue = parseInt(quantityInput.val());
        if (!isNaN(currentValue)) {
            quantityInput.val(currentValue + 1);
            updatePrice();
        }
    });

    $('.button-minus').on('click', function() {
        const quantityInput = $(this).siblings('.quantity');
        const price = parseFloat(quantityInput.data('price'));
        let currentValue = parseInt(quantityInput.val());
        if (!isNaN(currentValue) && currentValue > 1) {
            quantityInput.val(currentValue - 1);
            updatePrice();
        }
    });


    function updatePrice() {
        let subtotal = 0;
        $('.item-row').each(function() {
            const quantity = parseInt($(this).find('.quantity').val());
            const price = parseFloat($(this).find('.item-price').text().replace('Rs. ', ''));
            subtotal += quantity * price;
        });
        $('#subtotal').text('Rs. ' + subtotal.toFixed(2));
        $('#total').text('Rs. ' + subtotal.toFixed(2));

        // Update the quantity in the session
        $('.item-row').each(function() {
            const quantity = $(this).find('.quantity').val();
            const index = $(this).find('.btn-delete-item').data('index');
            $.ajax({
                url: `<?php echo e(route('cart.update')); ?>`,
                method: 'POST',
                data: {
                    _token: "<?php echo e(csrf_token()); ?>",
                    index: index,
                    quantity: quantity
                },
                success: function(response) {
                },
                error: function(xhr) {
                }
            });
        });
    }



    // Delete item from cart
    $('.btn-delete-item').on('click', function(e) {
        e.preventDefault();

        const index = $(this).data('index');

        $.ajax({
            url: `<?php echo e(route('cart.remove', '')); ?>/${index}`,
            method: 'DELETE',
            data: {
                _token: "<?php echo e(csrf_token()); ?>"
            },
            success: function(response) {
                location.reload(); 
            },
            error: function(xhr) {
                alert('Something went wrong. Please try again.');
            }
        });
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\chint\OneDrive\Documents\GitHub\online-marketing\resources\views/shopping_cart.blade.php ENDPATH**/ ?>