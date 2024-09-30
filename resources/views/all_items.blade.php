
@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
    .product-image-wrapper {
        position: relative;
    }

    .btn-cart {
        background-color: white; 
        border: none;
        border-radius: 50%;
        width: 40px; 
        height: 40px; 
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background-color 0.3s, color 0.3s; 
    }

    .btn-cart i {
        font-size: 1.5rem; 
        color: black;
    }

    .btn-cart:hover {
        background-color: black; 
    }

    .btn-cart:hover i {
        color: white; 
    }

/*FIlter*/

    body {
        font-family: Arial, sans-serif;
    }

    .filter-sidebar {
        width: 250px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    .filter-title {
            font-size: 1.6em;
            color: #000;
            font-weight: bold;
            text-align: left;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
            position: relative;
            padding-left: 35px; /* Space for the icon */
        }

    .filter-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .filter-list li {
        margin-bottom: 15px;
    }

    .filter-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        cursor: pointer;
    }

    .filter-item span {
        font-size: 1em;
    }

    .filter-item .toggle {
        font-size: 1.2em;
        font-weight: bold;
        color: #000;
    }

    .filter-item:hover .toggle {
       color: #007bff;
    }

    .filter-content {
       display: none;
       padding: 10px 0;
       margin-left: 15px;
    }

    .color-circle {
       width: 20px;
       height: 20px;
       border-radius: 50%;
       display: inline-block;
       margin: 5px;
       border: 1px solid #ccc;
    }

    label {
       display: block;
       margin: 5px 0;
    }

    .filter-sidebar {
       overflow-y: auto;
       height: 100vh;
    }

    .filter-sidebar::-webkit-scrollbar {
       width: 6px;
    }

    .filter-sidebar::-webkit-scrollbar-track {
       background: #f1f1f1;
    }

    .filter-sidebar::-webkit-scrollbar-thumb {
       background-color: #ccc;
       border-radius: 10px;
}

/* Star Rating */
    .star-rating {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .star-rating input {
        display: none;
    }

    .star-rating label {
        font-size: 2em;
        color: #ddd;
        cursor: pointer;
        padding: 0 5px;
    }

    .star-rating input:checked ~ label,
    .star-rating label:hover,
    .star-rating label:hover ~ label {
        color: gold;
    }

/* Price Range Slider */
    .price-range input[type="range"] {
        width: 100%;
        appearance: none;
        background: transparent;
    }

    .price-range input[type="range"]::-webkit-slider-runnable-track {
        height: 2px;
        background: #000;
    }

    .price-range input[type="range"]::-webkit-slider-thumb {
        appearance: none;
        width: 20px;
        height: 20px;
        background: #fff;
        border: 2px solid #ccc;
        border-radius: 50%;
        cursor: pointer;
        margin-top: -9px;
    }

    .price-range input[type="range"]::-moz-range-thumb {
        width: 20px;
        height: 20px;
        background: #fff;
        border: 2px solid #ccc;
        border-radius: 50%;
        cursor: pointer;
    }

    .price-range-values {
        display: flex;
        justify-content: space-between;
        font-size: 0.9em;
        margin-top: 5px;
    }

/* Align min and max on the same line with a lighter color */
    .price-range-values span {
         color: #555;
    }   

</style>

<div class="container mt-4 mb-5" style="width: 80%;">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>        
                <li class="breadcrumb-item active" aria-current="page">All Products</li>
        </ol>
    </nav>

    <div class="products">
        @if($products->isEmpty())
            <div class="no-products">
                <p>No products found.</p>
            </div>
        @else
        
            <div class="row mt-3">
                @foreach ($products as $index => $product)
                    <div class="col-md-3">
                        <div class="products-item position-relative">
                            <a href="{{ route('single_product_page', ['product_id' => $product->product_id]) }}" class="d-block text-decoration-none">
                                @if($product->images->isNotEmpty())
                                    <div class="product-image-wrapper position-relative">
                                        <img src="{{ asset('storage/' . $product->images->first()->image_path) }}" alt="Product Image" class="img-fluid">
                                        <button type="button" class="btn btn-cart position-absolute bottom-0 end-0 me-2 mb-2" data-bs-toggle="modal" data-bs-target="#cartModal_{{ $product->product_id }}">
                                            <i class="bi bi-cart-plus"></i>
                                        </button>
                                    </div>
                                @else
                                    <img src="{{ asset('storage/default-image.jpg') }}" alt="Default Image" class="img-fluid">
                                @endif
                                <h6>{{ $product->product_name }}</h6>
                                <h6>{!! $product->product_description !!}</h6>
                                <div class="price">Rs.{{ $product->normal_price }}</div>
                            </a>
                        </div>
                    </div>

                    @if (($loop->index + 1) % 4 == 0)
                        </div>
                        <div class="row-divider"></div>
                        <div class="row">
                    @endif
                @endforeach
            </div>
        @endif
    </div>


    <!-- filter modal-->
    <div class="filter-sidebar">
        <h3>Filter</h3>
        <ul class="filter-list">
            <!-- Categories Filter with Underline -->
            <li>
                <div class="filter-item categories" onclick="toggleSection('categories-section')">
                    <span>Categories</span>
                    <span class="toggle" id="categories-toggle">+</span>
                </div>
                <div id="categories-section" class="filter-content">
                    <label><input type="checkbox"> Baby Item</label><br>
                    <label><input type="checkbox"> Beauty Item</label><br>
                    <label><input type="checkbox"> Home Appliances</label><br>
                    <label><input type="checkbox">Women Clothes</label><br>
                </div>
            </li>

            <!-- Size Filter -->
            <li>
                <div class="filter-item" onclick="toggleSection('size-section')">
                    <span>Size</span>
                    <span class="toggle" id="size-toggle">+</span>
                </div>
                <div id="size-section" class="filter-content">
                    <label><input type="checkbox"> one-size</label>
                    <label><input type="checkbox"> S</label>
                    <label><input type="checkbox"> M</label>
                    <label><input type="checkbox"> L</label>
                    <label><input type="checkbox"> XL</label>
                    <label><input type="checkbox"> 2XL</label>
                </div>
            </li>
            <!-- Color Filter -->
            <li>
                <div class="filter-item" onclick="toggleSection('color-section')">
                    <span>Color</span>
                    <span class="toggle" id="color-toggle">+</span>
                </div>
                <div id="color-section" class="filter-content">
                    <div class="color-circle" style="background-color: #FF5733;"></div>
                    <div class="color-circle" style="background-color: #000000;"></div>
                    <div class="color-circle" style="background-color: #3498DB;"></div>
                    <div class="color-circle" style="background-color: #F1C40F;"></div>
                    <div class="color-circle" style="background-color: #E74C3C;"></div>
                    <div class="color-circle" style="background-color: #9B59B6;"></div>
                    <div class="color-circle" style="background-color: #F39C12;"></div>
                    <div class="color-circle" style="background-color: #F7DC6F;"></div>
                    <div class="color-circle" style="background-color: #6C3483;"></div>
                </div>
            </li>
            <!-- Price Range Filter -->
            <li>
                <div class="filter-item" onclick="toggleSection('price-range-section')">
                    <span>Price Range (Rs)</span>
                    <span class="toggle" id="price-range-toggle">+</span>
                </div>
                <div id="price-range-section" class="filter-content price-range">
                    <input type="range" id="price-range" min="0" max="2194" value="0" oninput="updatePriceRange()">
                    <div class="price-range-values">
                        <span id="price-min">Rs 0</span>
                        <span id="price-max">Rs 2194</span>
                    </div>
                </div>
            </li>
            <!-- Rating Filter with Stars -->
            <li>
                <div class="filter-item" onclick="toggleSection('rating-section')">
                    <span>Rating</span>
                    <span class="toggle" id="rating-toggle">+</span>
                </div>
                <div id="rating-section" class="filter-content">
                    <div class="star-rating">
                        <input type="radio" id="star5" name="rating" value="5">
                        <label for="star5">&#9733;</label>
                        <input type="radio" id="star4" name="rating" value="4">
                        <label for="star4">&#9733;</label>
                        <input type="radio" id="star3" name="rating" value="3">
                        <label for="star3">&#9733;</label>
                        <input type="radio" id="star2" name="rating" value="2">
                        <label for="star2">&#9733;</label>
                        <input type="radio" id="star1" name="rating" value="1">
                        <label for="star1">&#9733;</label>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    @foreach ($products as $product)
    <div class="modal fade" id="cartModal_{{ $product->product_id }}" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content" style="border-radius: 0;">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row gx-5">
                        <aside class="col-lg-5">
                            <div class="rounded-4 mb-3 d-flex justify-content-center">
                                <a class="rounded-4 main-image-link" href="{{ asset('storage/' . $product->images->first()->image_path) }}">
                                    <img id="mainImage" class="rounded-4 fit" src="{{ asset('storage/' . $product->images->first()->image_path) }}" />
                                </a>
                            </div>
                            <div class="d-flex justify-content-center mb-3">
                                @foreach($product->images as $image)
                                <a class="mx-1 rounded-2 thumbnail-image" data-image="{{ asset('storage/' . $image->image_path) }}" href="javascript:void(0);">
                                    <img class="thumbnail rounded-2" src="{{ asset('storage/' . $image->image_path) }}" />
                                </a>
                                @endforeach
                            </div>
                        </aside>

                        <main class="col-lg-7">
                            <h4>{{ $product->product_name }}</h4>
                            <p>{!! $product->product_description !!}</p>
                            <div class="d-flex flex-row my-3">
                                <div class="text-warning mb-1 me-2">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span class="ms-1">4.5</span>
                                </div>
                                <span class="text-primary">18 Ratings | </span>
                                <span class="text-primary">&nbsp; 25 Questions Answered</span>
                            </div>
                            <div style="margin-top: -15px;">
                                <span class="text-muted">Brand: </span>
                                <span class="text-primary">No Brand | More Wearable technology from No Brand</span>
                            </div>
                            <hr />
                            
                            <div class="product-availability mt-3 mb-1">
                                <span>Availability :</span>
                                @if($product->quantity > 1)
                                    <span class="ms-1" style="color:#4caf50;">In stock</span>
                                @else
                                    <span class="ms-1" style="color:red;">Out of stock</span>
                                @endif
                            </div>

                            @if($product->variations->where('type', 'Size')->isNotEmpty())
                                <div class="mb-2">
                                    <span>Size: </span>
                                    @foreach($product->variations->where('type', 'Size') as $size)
                                        <button class="btn btn-outline-secondary btn-sm me-1 size-option" style="height:28px;" data-size="{{ $size->value }}">{{ $size->value }}</button>
                                    @endforeach
                                </div>
                            @endif

                            @if($product->variations->where('type', 'Color')->isNotEmpty())
                                <div class="mb-2">
                                    <span>Color: </span>
                                    @foreach($product->variations->where('type', 'Color') as $color)
                                        <button class="btn btn-outline-secondary btn-sm color-option" 
                                            style="background-color: {{ $color->value }}; border-color: #e8ebec; height: 17px; width: 15px;" 
                                            data-color="{{ $color->value }}"></button>
                                    @endforeach
                                </div>
                            @endif

                            <div class="product-price mb-3 mt-3">
                                <span class="h4" style="color:#f55b29;">Rs. {{ $product->normal_price }}</span>
                            </div>

                            @auth
                                <a href="#" class="btn btn-custom-cart mb-3 add-to-cart-modal shadow-0 {{ $product->quantity <= 1 ? 'btn-disabled' : '' }}"
                                    data-product-id="{{ $product->product_id }}" data-auth="true" style="width: 40%;">
                                    <i class="me-1 fa fa-shopping-basket"></i>Add to cart
                                </a>
                            @else
                                <a href="#" class="btn btn-custom-cart mb-3 add-to-cart-modal shadow-0 {{ $product->quantity <= 1 ? 'btn-disabled' : '' }}" 
                                    data-product-id="{{ $product->product_id }}" data-auth="false" style="width: 40%;">
                                    <i class="me-1 fa fa-shopping-basket"></i>Add to cart
                                </a>
                            @endauth
                            <a href="{{ route('single_product_page', $product->product_id ) }}" style="text-decoration: none; font-size:14px; color: #297aa5">
                            View Full Details<i class="fa-solid fa-circle-right ms-1"></i></a>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>

   


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.btn-cart').forEach(button => {
            button.addEventListener('click', function(event) {
                event.stopPropagation();
                event.preventDefault();
            });
        });
    });

</script>
<script>
 $(document).ready(function() {
    //Add to Cart click event
    $('.add-to-cart-modal').on('click', function(e) {
        e.preventDefault();

        const productId = $(this).data('product-id');
        const isAuth = $(this).data('auth');  
        const selectedSize = $('button.size-option.active').text();  
        const selectedColor = $('button.color-option.active').data('color');  

        if (isAuth === true || isAuth === "true") { 
            $.ajax({
                url: "{{ route('cart.add') }}",
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    product_id: productId,
                    size: selectedSize || null,  
                    color: selectedColor || null 
                },
                success: function(response) {
                    $.get("{{ route('cart.count') }}", function(data) {
                        $('#cart-count').text(data.cart_count);
                    });

                    toastr.success('Item added to cart!', 'Success', {
                        positionClass: 'toast-top-right',
                        timeOut: 3000,
                    });

                    $('button.size-option.active').removeClass('active');
                    $('button.color-option.active').removeClass('active');
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

    $('.size-option').on('click', function() {
        $('.size-option').removeClass('active');
        $(this).addClass('active');
    });

    $('.color-option').on('click', function() {
        $('.color-option').removeClass('active');
        $(this).addClass('active');
    });

    $('.color-option').on('click', function() {
        $('.color-option').removeClass('selected-color');
        $(this).addClass('selected-color');
    });  
});

document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.thumbnail-image').forEach(function(thumbnail) {
            thumbnail.addEventListener('click', function() {
                const newImage = this.getAttribute('data-image');
                document.getElementById('mainImage').setAttribute('src', newImage);
                document.querySelector('.main-image-link').setAttribute('href', newImage);
            });
        });
    });

</script>

<script>
        function toggleSection(sectionId) {
            var section = document.getElementById(sectionId);
            var toggle = document.getElementById(sectionId.split('-')[0] + '-toggle');
            
            if (section.style.display === "none" || section.style.display === "") {
                section.style.display = "block";
                toggle.innerHTML = "-";
            } else {
                section.style.display = "none";
                toggle.innerHTML = "+";
            }
        }

        function updatePriceRange() {
            let rangeValue = document.getElementById('price-range').value;
            document.getElementById('price-min').innerText = `Rs ${rangeValue}`;
            document.getElementById('price-max').innerText = `Rs ${2194 - rangeValue}`;
        }
    </script>




@endsection
