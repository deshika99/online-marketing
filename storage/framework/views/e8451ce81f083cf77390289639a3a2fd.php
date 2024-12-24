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
.color-option.selected-color {
    border: 2px solid #007bff; /* Blue border for the selected color */
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Optional: adds a glow effect */
}
</style>


<!-- Start Page Title -->
<div class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h2>Search Results for: "<?php echo e($query); ?>"
                    </h2>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>Items</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

<!-- Start Products Area -->
        <section class="products-area pt-100 pb-70">
            <div class="container">
            
                    <div class="col-lg-12 col-md-12">
                        <!-- Check if products are paginated -->
                        <div class="products-filter-options">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-lg-4 col-md-4">
                                    <p>Showing <?php echo e($products->firstItem()); ?> – <?php echo e($products->lastItem()); ?> of <?php echo e($products->total()); ?></p>
                                </div>
                            </div>
                        </div>


                        <div id="products-collections-filter" class="row">
                        <?php if($products->isEmpty()): ?>
                            <div class="col-12">
                                <div class="no-products">
                                    <p>No products found.</p>
                                </div>
                            </div>
                        <?php else: ?>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-3 col-md-4 col-sm-6 products-col-item"> 
                                    <div class="single-products-box">
                                        <div class="products-image">
                                            <a href="<?php echo e(route('product-description', ['product_id' => $product->product_id])); ?>">
                                                <?php if($product->images->isNotEmpty()): ?>
                                                    <img src="<?php echo e(asset('storage/' . $product->images->first()->image_path)); ?>" class="main-image" alt="image" style="width: 90%; height:270px">
                                                    <img src="<?php echo e(asset('storage/' . $product->images->first()->image_path)); ?>" class="hover-image" alt="image"  style="width: 90%; height:270px">
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('storage/default-image.jpg')); ?>" class="main-image" alt="image">
                                                <?php endif; ?>
                                            </a>

                                            <div class="products-button">
                                                <ul>
                                                    <li>
                                                        <div class="wishlist-btn">
                                                            <a href="#" class="wishlist-toggle" data-product-id="<?php echo e($product->product_id); ?>" id="wishlist-<?php echo e($product->product_id); ?>">
                                                                <i class="bx bx-heart <?php echo e(in_array($product->product_id, $wishlistProductIds) ? 'filled' : ''); ?>"></i> 
                                                                <span class="tooltip-label">Add to Wishlist</span>
                                                            </a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        
                                            <?php if(($product->sale && $product->sale->status === 'active') || ($product->specialOffer && $product->specialOffer->status === 'active')): ?>
                                                <div class="sale-tag">
                                                    <?php if($product->sale && $product->sale->status === 'active'): ?>
                                                        <?php
                                                            $saleRate = (($product->normal_price - $product->sale->sale_price) / $product->normal_price) * 100;
                                                        ?>
                                                        - <?php echo e(round($saleRate)); ?>%
                                                    <?php elseif($product->specialOffer && $product->specialOffer->status === 'active'): ?>
                                                        <?php
                                                            $offerRate = (($product->normal_price - $product->specialOffer->offer_price) / $product->normal_price) * 100;
                                                        ?>
                                                        - <?php echo e(round($offerRate)); ?>%
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="products-content">
                                            <h3><a href="<?php echo e(route('product-description', ['product_id' => $product->product_id])); ?>"><?php echo e($product->product_name); ?></a></h3>
                                            <div class="price">
                                                <?php if($product->sale && $product->sale->status === 'active'): ?>
                                                    <span class="old-price">Rs. <?php echo e(number_format($product->normal_price, 2)); ?></span>
                                                    <span class="new-price">Rs. <?php echo e(number_format($product->sale->sale_price, 2)); ?></span>
                                                <?php elseif($product->specialOffer && $product->specialOffer->status === 'active'): ?>
                                                    <span class="old-price">Rs. <?php echo e(number_format($product->normal_price, 2)); ?></span>
                                                    <span class="new-price">Rs. <?php echo e(number_format($product->specialOffer->offer_price, 2)); ?></span>
                                                <?php else: ?>
                                                    <span class="new-price">Rs. <?php echo e(number_format($product->normal_price, 2)); ?></span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="star-rating">
                                                <?php for($i = 1; $i <= 5; $i++): ?>
                                                    <?php if($i <= floor($product->average_rating)): ?> 
                                                        <i class='bx bxs-star'></i> 
                                                    <?php elseif($i == ceil($product->average_rating) && fmod($product->average_rating, 1) >= 0.5): ?>
                                                        <i class='bx bxs-star-half'></i> 
                                                    <?php else: ?>
                                                        <i class='bx bx-star'></i>
                                                    <?php endif; ?>
                                                <?php endfor; ?>
                                            </div>

                                            <a href="/cart" class="add-to-cart" data-bs-toggle="modal" data-bs-target="#cartModal_<?php echo e($product->product_id); ?>">Add to Cart</a>
                                        </div>
                                        
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>


                        </div>


                        <div class="pagination-area text-center">
                            <!-- Previous Page Link -->
                            <?php if($products->onFirstPage()): ?>
                                <span class="prev page-numbers disabled"><i class='bx bx-chevron-left'></i></span>
                            <?php else: ?>
                                <a href="<?php echo e($products->previousPageUrl()); ?>" class="prev page-numbers"><i class='bx bx-chevron-left'></i></a>
                            <?php endif; ?>

                            <!-- Page Numbers -->
                            <?php $__currentLoopData = $products->getUrlRange(1, $products->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($page == $products->currentPage()): ?>
                                    <span class="page-numbers current" aria-current="page"><?php echo e($page); ?></span>
                                <?php else: ?>
                                    <a href="<?php echo e($url); ?>" class="page-numbers"><?php echo e($page); ?></a>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <!-- Next Page Link -->
                            <?php if($products->hasMorePages()): ?>
                                <a href="<?php echo e($products->nextPageUrl()); ?>" class="next page-numbers"><i class='bx bx-chevron-right'></i></a>
                            <?php else: ?>
                                <span class="next page-numbers disabled"><i class='bx bx-chevron-right'></i></span>
                            <?php endif; ?>
                        </div>


                    </div>
                
            </div>
        </section>
        <!-- End Products Area -->
         
        <!-- cart modal-->
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="modal fade" id="cartModal_<?php echo e($product->product_id); ?>" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content" style="border-radius: 0;">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row gx-5">
                        <aside class="col-lg-5">
                        <div class="rounded-4 mb-3 d-flex justify-content-center">
                            <?php if($product->images->first()): ?>
                                <a class="rounded-4 main-image-link" href="<?php echo e(asset('storage/' . $product->images->first()->image_path)); ?>">
                                    <img id="mainImage" class="rounded-4 fit" style="width:280px; height:auto"
                                        src="<?php echo e(asset('storage/' . $product->images->first()->image_path)); ?>" 
                                    />
                                </a>
                            <?php else: ?>
                                <a class="rounded-4 main-image-link" href="<?php echo e(asset('images/default.jpg')); ?>">
                                    <img id="mainImage" class="rounded-4 fit" 
                                        src="<?php echo e(asset('images/default.jpg')); ?>" 
                                    />
                                </a>
                            <?php endif; ?>
                        </div>

                            <div class="d-flex justify-content-center mb-3">
                                <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="mx-1 rounded-2 thumbnail-image" data-image="<?php echo e(asset('storage/' . $image->image_path)); ?>" href="javascript:void(0);">
                                    <img class="thumbnail rounded-2" src="<?php echo e(asset('storage/' . $image->image_path)); ?>"  style="width:70px; height:auto"/>
                                </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </aside>

                        <main class="col-lg-7">
                            <h4><?php echo e($product->product_name); ?></h4>
                            <p class="description">
                                <?php echo e((str_replace('&nbsp;', ' ', strip_tags($product->product_description)))); ?>

                            </p>  
                            <div class="d-flex flex-row my-3">
                                <div class="text-warning mb-1 me-2">
                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                        <?php if($i <= floor($product->average_rating)): ?> 
                                            <i class='bx bxs-star'></i> 
                                        <?php elseif($i == ceil($product->average_rating) && fmod($product->average_rating, 1) >= 0.5): ?>
                                            <i class='bx bxs-star-half'></i> 
                                        <?php else: ?>
                                            <i class='bx bx-star'></i>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                    <span class="ms-1"><?php echo e(number_format($product->average_rating, 1)); ?></span>
                                </div>
                                <span class="text-primary"><?php echo e($product->rating_count); ?> Ratings  </span>
                               
                            </div>
                            <hr />
                            
                            <div class="product-availability mt-3 mb-1">
                                <span>Availability :</span>
                                <?php if($product->quantity > 1): ?>
                                    <span class="ms-1" style="color:#4caf50;">In stock</span>
                                <?php else: ?>
                                    <span class="ms-1" style="color:red;">Out of stock</span>
                                <?php endif; ?>
                            </div>

                            <div class="product-container">
                            <!-- Size Options -->
                            <?php if($product->variations->where('type', 'Size')->isNotEmpty()): ?>
                                <div class="mb-2">
                                    <span>Size: </span>
                                    <?php $__currentLoopData = $product->variations->where('type', 'Size'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($size->quantity > 0): ?>  
                                            <button class="btn btn-outline-secondary btn-sm me-1 size-option" style="height:28px;" data-size="<?php echo e($size->value); ?>">
                                                <?php echo e($size->value); ?>

                                            </button>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>
                            <!-- Color Options -->
                            <?php if($product->variations->where('type', 'Color')->isNotEmpty()): ?>
                                <div class="mb-2">
                                    <span>Color: </span>
                                    <?php $__currentLoopData = $product->variations->where('type', 'Color'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($color->quantity > 0): ?>  
                                            <button class="btn btn-outline-secondary btn-sm color-option" 
                                                style="background-color: <?php echo e($color->hex_value); ?>; border-color: #e8ebec; height: 17px; width: 15px;" 
                                                data-color="<?php echo e($color->hex_value); ?>" 
                                                data-color-name="<?php echo e($color->value); ?>">
                                            </button>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>

                            <div class="product-price mb-3 mt-3 d-flex align-items-center">
                                <span class="h4" style="color:#f55b29; margin-right: 10px;">
                                    <?php if($product->sale && $product->sale->status === 'active'): ?>
                                        <span class="sale-price">Rs. <?php echo e(number_format($product->sale->sale_price, 2)); ?></span>
                                    <?php elseif($product->specialOffer && $product->specialOffer->status === 'active'): ?>
                                        <span class="offer-price">Rs. <?php echo e(number_format($product->specialOffer->offer_price, 2)); ?></span>
                                    <?php else: ?>
                                        Rs. <?php echo e(number_format($product->normal_price, 2)); ?>

                                    <?php endif; ?>
                                </span>
                            </div>

                            <?php if(auth()->guard()->check()): ?>
                                <a href="#" class="btn btn-custom-cart mb-3 add-to-cart-modal shadow-0 <?php echo e($product->quantity <= 1 ? 'btn-disabled' : ''); ?>"
                                    data-product-id="<?php echo e($product->product_id); ?>" data-auth="true" style="width: 40%; background-color: #007bff; color: white;">
                                    <i class="me-1 fa fa-shopping-basket"></i>Add to cart
                                </a>
                            <?php else: ?>
                                <a href="#" class="btn btn-custom-cart mb-3 add-to-cart-modal shadow-0 <?php echo e($product->quantity <= 1 ? 'btn-disabled' : ''); ?>" 
                                    data-product-id="<?php echo e($product->product_id); ?>" data-auth="false" style="width: 40%; background-color: #007bff; color: white;">
                                    <i class="me-1 fa fa-shopping-basket"></i>Add to cart
                                </a>
                            <?php endif; ?>

                        </div>

                            <a href="<?php echo e(route('product-description', $product->product_id )); ?>" style="text-decoration: none; font-size:14px; color: #297aa5">
                            View Full Details<i class="fa-solid fa-circle-right ms-1"></i></a>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.js"></script>


<script>
        $(document).ready(function() {
    // Handle the click event on the heart icon
    $('.wishlist-toggle').on('click', function(e) {
        e.preventDefault(); 

        var productId = $(this).data('product-id'); 
        var heartIcon = $(this).find('i'); 

        $.ajax({
            url: '<?php echo e(route('wishlist.toggle')); ?>',
            method: 'POST',
            data: {
                product_id: productId,
                _token: $('meta[name="csrf-token"]').attr('content'),  // Ensure CSRF token is correct
            },
            success: function(response) {
                if (response.message === 'Product added to wishlist') {
                    heartIcon.addClass('filled');
                    alert(response.message);
                } else if (response.message === 'Product removed from wishlist') {
                    heartIcon.removeClass('filled');
                    alert(response.message);
                }
            },
            error: function() {
                alert('You must be logged in to add to wishlist');
            }
        });

    });
});

</script>     
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.btn-cart').forEach(button => {
            button.addEventListener('click', function(event) {
                event.stopPropagation();
                event.preventDefault();
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
    const colorButtons = document.querySelectorAll('.color-option');

    colorButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove the selected class from all buttons
            colorButtons.forEach(btn => btn.classList.remove('selected-color'));
            
            this.classList.add('selected-color');

            const selectedColor = this.getAttribute('data-color');
            console.log('Selected Color: ', selectedColor);

        });
    });
});


</script>


<script>
$(document).ready(function() {
    // Add to Cart click event
    $('.add-to-cart-modal').on('click', function(e) {
        e.preventDefault();
        console.log('Button clicked');  // Debugging line to check if the click event is firing

        const productId = $(this).data('product-id');
        const isAuth = $(this).data('auth');
        const productContainer = $(this).closest('.product-container');
        const sizeOptions = productContainer.find('button.size-option');
        const colorOptions = productContainer.find('button.color-option');
        const hasSizeOptions = sizeOptions.length > 0;
        const hasColorOptions = colorOptions.length > 0;

        const selectedSize = hasSizeOptions ? sizeOptions.filter('.active').data('size') : null;
        const selectedColor = hasColorOptions ? colorOptions.filter('.active').data('color') : null;

        // Check if size is required and not selected
        if (hasSizeOptions && !selectedSize) {
            toastr.warning('Please select a size option before adding this product to the cart.', 'Warning', {
                positionClass: 'toast-top-right',
                timeOut: 3000,
            });
            return; // Stop further execution
        }

        // Check if color is required and not selected
        if (hasColorOptions && !selectedColor) {
            toastr.warning('Please select a color option before adding this product to the cart.', 'Warning', {
                positionClass: 'toast-top-right',
                timeOut: 3000,
            });
            return; // Stop further execution
        }

        // Check if the user is authenticated
        if (isAuth === true || isAuth === "true") { 
            $.ajax({
                url: "<?php echo e(route('cart.add')); ?>",
                method: 'POST',
                data: {
                    _token: "<?php echo e(csrf_token()); ?>",
                    product_id: productId,
                    size: selectedSize,
                    color: selectedColor
                },
                success: function(response) {
                    $.get("<?php echo e(route('cart.count')); ?>", function(data) {
                        $('#cart-count').text(data.cart_count);
                    });

                    toastr.success('Item added to cart!', 'Success', {
                        positionClass: 'toast-top-right',
                        timeOut: 3000,
                    });

                    productContainer.find('button.size-option.active').removeClass('active');
                    productContainer.find('button.color-option.active').removeClass('active');
                },
                error: function(xhr) {
                    toastr.error('Something went wrong. Please try again.', 'Error', {
                        positionClass: 'toast-top-right',
                        timeOut: 3000,
                    });
                }
            });
        } else {
            toastr.warning('Please log in to add items to your cart.', 'Warning', {
                positionClass: 'toast-top-right',
                timeOut: 3000,
            });
        }
    });

    // Size selection click event
    $('.size-option').on('click', function() {
        $('.size-option').removeClass('active');
        $(this).addClass('active');
    });

    // Color selection click event
    $('.color-option').on('click', function() {
        // Reset previous color selection
        $('.color-option').removeClass('active');
        $(this).addClass('active');
    });
});


</script>


<script>

$('.js-range-of-price').on('input', function() {
    var minPrice = $(this).data('min');
    var maxPrice = $(this).data('max');
    var priceRange = $(this).val();

    // Update the URL with the price range filter
    var url = new URL(window.location);
    url.searchParams.set('price', priceRange);
    window.location.href = url.toString();
});

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\online-marketing\resources\views/frontend/search_results.blade.php ENDPATH**/ ?>