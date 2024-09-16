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
</style>

<div class="container mt-4 mb-5" style="width: 80%;">
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

    <div class="products">
        @if($products->isEmpty())
            <div class="no-products">
                <p>No products found under this category.</p>
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
                                <h6>{{ $product->product_description }}</h6>
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

    <!-- Modal for each product -->
    @foreach ($products as $product)
        <div class="modal fade" id="cartModal_{{ $product->product_id }}" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cartModalLabel">Add to Cart</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('cart.add', ['product_id' => $product->product_id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <input type="number" name="quantity" class="form-control" value="1" min="1" max="10">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>

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

@endsection
