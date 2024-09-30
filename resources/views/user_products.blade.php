@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.css">



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





</style>

<div class="container mt-4 mb-5" style="width: 100%;">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>

            @if(isset($subcategory))
                <li class="breadcrumb-item">
                    <a href="{{ route('user_products', ['category' => $category, 'subcategory' => $subcategory]) }}">{{ $subcategory }}</a>
                </li>
            @endif

            @if(isset($subsubcategory))
                <li class="breadcrumb-item active" aria-current="page">{{ $subsubcategory }}</li>
            @elseif(isset($subcategory))
                <li class="breadcrumb-item active" aria-current="page">{{ $subcategory }}</li>
            @elseif(isset($category))
                <li class="breadcrumb-item active" aria-current="page">{{ $category }}</li>
            @else
                <li class="breadcrumb-item active" aria-current="page">All Products</li>
            @endif
        </ol>
    </nav>

    <div class="filter-button" onclick="toggleFilter()">Filter</div>
    <div class="container products-container">
   
    <!-- Filter sidebar -->
    <div class="filter-sidebar" style="width: 25%">
        <div class="filter-header">
            <h3 class="filter-title">Filter</h3>
            <button class="reset-button mb-3" onclick="resetFilters()">Reset</button>
        </div>
        <ul class="filter-list">
        <li>
            <div class="filter-item" onclick="toggleSection('size-section')">
                <span>Size</span>
                <span class="toggle" id="size-toggle">+</span>
            </div>
            <div id="size-section" class="filter-content">
                <div class="size-buttons">
                    <button class="size-button" onclick="selectSize(this)">XS</button>
                    <button class="size-button" onclick="selectSize(this)">S</button>
                    <button class="size-button" onclick="selectSize(this)">M</button>
                    <button class="size-button" onclick="selectSize(this)">L</button>
                    <button class="size-button" onclick="selectSize(this)">XL</button>
                    <button class="size-button" onclick="selectSize(this)">2XL</button>
                    <button class="size-button" onclick="selectSize(this)">3XL</button>
                </div>
            </div>
        </li>

        <li>
            <div class="filter-item" onclick="toggleSection('color-section')">
                <span>Color</span>
                <span class="toggle" id="color-toggle">+</span>
            </div>
            <div id="color-section" class="filter-content">
                @foreach($colors as $color)
                    <div class="color-circle" style="background-color: {{ $color }};" onclick="selectColor(this)"></div>
                @endforeach
            </div>
        </li>


        <li>
            <div class="filter-item" onclick="toggleSection('price-range-section')">
                <span>Price Range (Rs)</span>
                <span class="toggle" id="price-range-toggle">+</span>
            </div>
            <div id="price-range-section" class="filter-content price-range">
                <div class="price-inputs">
                    <input type="number" id="price-min-input" placeholder="Min" oninput="updatePriceRange()">
                    <input type="number" id="price-max-input" placeholder="Max" oninput="updatePriceRange()">
                </div>
                <div id="price-range" style="margin-top: 10px;"></div>
            </div>
        </li>

        <li>
            <div class="filter-item" onclick="toggleSection('rating-section')">
                <span>Rating</span>
                <span class="toggle" id="rating-toggle">+</span>
            </div>
            <div id="rating-section" class="filter-content">
                <div class="rating-row">
                    <label class="mb-2">
                        <input type="checkbox" name="rating" value="5">
                        <div class="star-rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        </div>
                    </label>
                </div>
                <div class="rating-row">
                    <label class="mb-2">
                        <input type="checkbox" name="rating" value="4"> 
                        <div class="star-rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        </div>
                    </label>
                </div>
                <div class="rating-row">
                    <label class="mb-2">
                        <input type="checkbox" name="rating" value="3">
                        <div class="star-rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        </div>
                    </label>
                </div>
                <div class="rating-row">
                    <label class="mb-2">
                        <input type="checkbox" name="rating" value="2"> 
                        <div class="star-rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        </div>
                    </label>
                </div>
                <div class="rating-row">
                    <label class="mb-2">
                        <input type="checkbox" name="rating" value="1">
                        <div class="star-rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        </div>
                    </label>
                </div>
            </div>
        </li>
    </ul>
    </div>
    
    <div class="products" style="width: 85%">
    @if($products->isEmpty())
        <div class="no-products">
            <p>No products found under this category.</p>
        </div>
    @else
    <div class="row mt-3">
        @foreach ($products as $index => $product)
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4"> 
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
                        <div class="price">Rs.{{ $product->normal_price }}</div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    @endif
</div>

</div>




        <li>
            <div class="filter-item" onclick="toggleSection('price-range-section')">
                <span>Price Range (Rs)</span>
                <span class="toggle" id="price-range-toggle">+</span>
            </div>
            <div id="price-range-section" class="filter-content price-range">
                <div class="price-inputs">
                    <input type="number" id="price-min-input" placeholder="Min" oninput="updatePriceRange()">
                    <input type="number" id="price-max-input" placeholder="Max" oninput="updatePriceRange()">
                </div>
                <div id="price-range" style="margin-top: 10px;"></div>
            </div>
        </li>

        <li>
            <div class="filter-item" onclick="toggleSection('rating-section')">
                <span>Rating</span>
                <span class="toggle" id="rating-toggle">+</span>
            </div>
            <div id="rating-section" class="filter-content">
                <div class="rating-row">
                    <label class="mb-2">
                        <input type="checkbox" name="rating" value="5">
                        <div class="star-rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        </div>
                    </label>
                </div>
                <div class="rating-row">
                    <label class="mb-2">
                        <input type="checkbox" name="rating" value="4"> 
                        <div class="star-rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        </div>
                    </label>
                </div>
                <div class="rating-row">
                    <label class="mb-2">
                        <input type="checkbox" name="rating" value="3">
                        <div class="star-rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        </div>
                    </label>
                </div>
                <div class="rating-row">
                    <label class="mb-2">
                        <input type="checkbox" name="rating" value="2"> 
                        <div class="star-rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        </div>
                    </label>
                </div>
                <div class="rating-row">
                    <label class="mb-2">
                        <input type="checkbox" name="rating" value="1">
                        <div class="star-rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        </div>
                    </label>
                </div>
            </div>
        </li>
    </ul>
    </div>
    
    <div class="products" style="width: 85%">
    @if($products->isEmpty())
        <div class="no-products">
            <p>No products found under this category.</p>
        </div>
    @else
    <div class="row mt-3">
        @foreach ($products as $index => $product)
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4"> 
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
                        <div class="price">Rs.{{ $product->normal_price }}</div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    @endif
</div>

</div>



   <!-- cart modal-->
    @foreach ($products as $product)
    <div class="modal fade" id="cartModal_{{ $product->product_id }}" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
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

                            @if($product->variations->where('type', 'Material')->isNotEmpty())
                                <div class="mb-3 mt-2 d-flex align-items-center"> 
                                    <span class="me-2">Material:</span>
                                    @foreach($product->variations->where('type', 'Material') as $material)
                                        <span class="me-3">{{ $material->value }}</span> 
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



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.js"></script>
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
function resetFilters() {
    const checkboxes = document.querySelectorAll('.filter-content input[type="checkbox"]');
    checkboxes.forEach(checkbox => checkbox.checked = false);
    
    const buttons = document.querySelectorAll('.size-button');
    buttons.forEach(btn => btn.classList.remove('selected'));
    
    const priceMinInput = document.getElementById('price-min-input');
    const priceMaxInput = document.getElementById('price-max-input');
    priceMinInput.value = '';
    priceMaxInput.value = '';

    const colorCircles = document.querySelectorAll('.color-circle');
    colorCircles.forEach(circle => circle.classList.remove('selected-color'));
    
    const priceRange = document.getElementById('price-range');
    priceRange.innerHTML = ''; 

    location.reload();
}


function selectSize(button) {
    button.classList.toggle('selected');
    filterProducts();
}
function selectColor(circle) {
    circle.classList.toggle('selected-color');
    filterProducts(); 
}

function filterProducts() {
    const selectedSizes = Array.from(document.querySelectorAll('.size-button.selected')).map(btn => btn.innerText);
    const selectedColors = Array.from(document.querySelectorAll('.color-circle.selected-color')).map(circle => circle.style.backgroundColor);
    const priceMin = document.getElementById('price-min-input').value;
    const priceMax = document.getElementById('price-max-input').value;

    fetch(`/filter-products`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ selectedSizes, selectedColors, priceMin, priceMax })
    })
    .then(response => response.json())
    .then(data => {
        updateProductDisplay(data.products);
    });
}

function updateProductDisplay(products) {
    const productsContainer = document.querySelector('.products .row');
    productsContainer.innerHTML = '';

    if (products.length === 0) {
        productsContainer.innerHTML = '<div class="no-products"><p>No products found under this category.</p></div>';
        return;
    }

    products.forEach(product => {
        const productHTML = `
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4">
                <div class="products-item position-relative">
                    <a href="/single_product/${product.product_id}" class="d-block text-decoration-none">
                        <img src="/storage/${product.images[0].image_path}" alt="Product Image" class="img-fluid">
                        <h6>${product.product_name}</h6>
                        <div class="price">Rs.${product.normal_price}</div>
                    </a>
                </div>
            </div>
        `;
        productsContainer.innerHTML += productHTML;
    });
}


document.getElementById('price-min-input').addEventListener('input', filterProducts);
document.getElementById('price-max-input').addEventListener('input', filterProducts);
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
            document.getElementById('price-min').innerText = Rs ${rangeValue};
            document.getElementById('price-max').innerText = Rs ${2194 - rangeValue};
        }
    </script>
@endsection