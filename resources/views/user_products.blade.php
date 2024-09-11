@extends('layouts.app')

@section('content')

<div class="container mt-4 mb-5" style="width: 80%;">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $category }}</li>
        </ol>
    </nav>

    <div class="products">
        <div class="row mt-3">
            @foreach ($products as $index => $product)
                <div class="col-md-3">
                    <div class="products-item">
                        <a href="{{ route('single_product_page', ['product_id' => $product->product_id]) }}">
                            @if($product->images->isNotEmpty())
                                <img src="{{ asset('storage/' . $product->images->first()->image_path) }}" alt="Product Image">
                            @else
                                <img src="{{ asset('storage/default-image.jpg') }}" alt="Default Image">
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
    </div>

</div>



@endsection
