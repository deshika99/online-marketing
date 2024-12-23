<?php $__env->startSection('content'); ?>

       
       <!-- Start Page Title -->
        <div class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h2>Cart</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Start Cart Area -->
<section class="cart-area ptb-100">
    <div class="container">
        
            <div class="cart-table table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Name</th>
                            <th scope="col">Unit Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="product-thumbnail">
                                    <a href="<?php echo e(route('product-description', ['product_id' => $item->product_id])); ?>">
                                        <img src="<?php echo e(asset('storage/' . $item->product->images->first()->image_path)); ?>" alt="item">
                                    </a>
                                </td>

                                <td class="product-name">
                                    <a href="<?php echo e(route('product-description', ['product_id' => $item->product_id])); ?>"><?php echo e($item->product->product_name); ?></a>
                                    <ul>
                                        <li>Color: <span style="background-color: <?php echo e($item->color); ?>; width: 15px; height: 15px; display: inline-block; border-radius: 50%; margin-left: 5px; vertical-align: middle;"></span></li>
                                        <li>Size: <span><?php echo e($item->size); ?></span></li>
                                    </ul>
                                </td>

                                <td class="product-price">
                                    <span class="unit-amount">
                                        <?php
                                            // Check if there's an active special offer, otherwise check for sale, else use normal price
                                            $price = $item->product->specialOffer && $item->product->specialOffer->status === 'active' 
                                                ? $item->product->specialOffer->offer_price 
                                                : ($item->product->sale && $item->product->sale->status === 'active' 
                                                    ? $item->product->sale->sale_price 
                                                    : $item->product->normal_price);
                                        ?>
                                        LKR <?php echo e(number_format($price, 2)); ?>

                                    </span>
                                </td>


                                <td class="product-quantity">
                                    <div class="input-counter">
                                        <span class="minus-btn" data-product-id="<?php echo e($item->product_id); ?>"><i class='bx bx-minus'></i></span>
                                        <input type="text" min="1" value="<?php echo e($item->quantity); ?>" name="quantity[<?php echo e($item->id); ?>]" class="quantity-input">
                                        <span class="plus-btn" data-product-id="<?php echo e($item->product_id); ?>"><i class='bx bx-plus'></i></span>
                                    </div>
                                </td>


                                <td class="product-subtotal">
                                    <span class="subtotal-amount">LKR <?php echo e(number_format($price * $item->quantity, 2)); ?></span>
                                    <a href="javascript:void(0);" class="btn-delete-item remove" data-product-id="<?php echo e($item->product_id); ?>">
                                        <i class='bx bx-trash'></i>
                                    </a>
                                   

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5">No items in the cart</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>


            <div class="cart-totals">
                <h3>Cart Totals</h3>
                <ul>
                    <li>Subtotal <span>LKR <?php echo e(number_format($cart->sum(function($item) {
                        // Check for active special offer, then sale, otherwise normal price
                        $price = $item->product->specialOffer && $item->product->specialOffer->status === 'active' 
                            ? $item->product->specialOffer->offer_price 
                            : ($item->product->sale && $item->product->sale->status === 'active' 
                                ? $item->product->sale->sale_price 
                                : $item->product->normal_price);
                        return $price * $item->quantity;
                    }), 2)); ?></span></li>
                    
                    <li>Shipping <span>LKR 300.00</span></li>
                    
                    <li>Total <span>LKR <?php echo e(number_format($cart->sum(function($item) {
                        // Check for active special offer, then sale, otherwise normal price
                        $price = $item->product->specialOffer && $item->product->specialOffer->status === 'active' 
                            ? $item->product->specialOffer->offer_price 
                            : ($item->product->sale && $item->product->sale->status === 'active' 
                                ? $item->product->sale->sale_price 
                                : $item->product->normal_price);
                        return $price * $item->quantity;
                    }) + 300, 2)); ?></span></li>
                </ul>

                <a href="/checkout" class="default-btn">Proceed to Checkout</a>
            </div>

    </div>
</section>
<!-- End Cart Area -->


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // Update quantity and price when plus or minus button is clicked
    $('.plus-btn, .minus-btn').on('click', function() {
        const quantityInput = $(this).siblings('.quantity-input');  // Get the corresponding input field
        let currentValue = parseInt(quantityInput.val());

        // Ensure the current value is a number and avoid multiple triggers
        if (!isNaN(currentValue)) {
            // For the plus button, increase the value by 1
            if ($(this).hasClass('plus-btn')) {
                quantityInput.val(currentValue + 1);
            }
            // For the minus button, decrease the value by 1 (avoid going below 1)
            else if ($(this).hasClass('minus-btn') && currentValue > 1) {
                quantityInput.val(currentValue - 1);
            }

            // Now update the price immediately after changing the value
            updatePrice($(this).closest('tr'));  // Update the price and total after quantity change
        }
    });

    // Function to update the price when quantity changes
    function updatePrice(itemRow) {
        let quantity = parseInt(itemRow.find('.quantity-input').val());  // Get the updated quantity
        let price = parseFloat(itemRow.find('.product-price span').text().replace('Rs.', '').trim());  // Get the price from product-price

        // Update subtotal for the item
        let subtotal = quantity * price;
        itemRow.find('.product-subtotal span').text('Rs. ' + subtotal.toFixed(2));  // Update the item subtotal

        // Update the total price
        let total = 0;
        $('.cart-table .product-subtotal span').each(function() {
            total += parseFloat($(this).text().replace('Rs.', '').trim());
        });

        // Update subtotal and total values
        $('#subtotal').text('Rs. ' + total.toFixed(2));
        $('#total').text('Rs. ' + (total + 300).toFixed(2));  // Adding shipping (if applicable)

        // AJAX request to update the cart in the backend
        const productId = itemRow.find('.plus-btn').data('product-id');
        const updatedQuantity = itemRow.find('.quantity-input').val();

        $.ajax({
            url: '<?php echo e(route('cart.update')); ?>',
            method: 'POST',
            data: {
                _token: '<?php echo e(csrf_token()); ?>',
                product_id: productId,
                quantity: updatedQuantity
            },
            success: function(response) {
                if (response.success) {
                    console.log(response.message);  // Log the success message
                    location.reload();  // Refresh the page after a successful update
                }
            },
            error: function(xhr) {
                console.log('Error updating quantity', xhr);  // Log error if AJAX fails
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
           
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\online-marketing\resources\views/frontend/cart.blade.php ENDPATH**/ ?>