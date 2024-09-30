@extends('layouts.admin_main.master')

@section('content')

<main style="margin-top: 58px">
    <div class="container px-5 py-5">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="mb-1 mx-5">Product Details</h3>
        </div>

        <div class="card p-5 mx-5">
            <div class="row">
                <div class="col-md-7"> 
                    <div class="row mb-2">
                        <div class="col-12"><strong class="me-2">Product ID:</strong>{{ $product->product_id }}</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-12"><strong class="me-2">Name:</strong>{{ $product->product_name }}</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-12"><strong class="me-2">Images:</strong>
                            <div class="d-flex flex-wrap">
                                @foreach($product->images as $image)
                                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="Product Image" class="img-thumbnail" width="100" style="margin-right: 5px;">
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-12">
                            <strong class="me-2">Description:</strong>
                            {!! $product->product_description !!}
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-12"><strong class="me-2">Category:</strong>{{ $product->product_category }}</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-12"><strong class="me-2">In Stock Quantity:</strong>{{ $product->quantity }}</div>
                    </div>
                </div>

                <div class="col-md-5"> 
                    <div class="row mb-2">
                        <div class="col-12"><strong class="me-2">Normal Price:</strong> Rs {{ $product->normal_price }}</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-12"><strong class="me-2">Affiliate:</strong> {{ $product->is_affiliate ? 'Yes' : 'No' }}</div>
                    </div>

                    @if($product->is_affiliate)
                        <div class="affiliate-fields">
                            <div class="row mb-2">
                                <div class="col-12"><strong class="me-2">Affiliate Price:</strong> Rs {{ $product->affiliate_price }}</div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-12"><strong class="me-2">Commission:</strong> {{ $product->commission_percentage }}%</div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-12"><strong class="me-2">Total Price:</strong> Rs {{ $product->total_price }}</div>
                            </div>
                        </div>
                    @endif

                    @if($product->variations->where('type', 'Size')->isNotEmpty())
                    <div class="row mb-2">
                        <div class="col-12"><strong class="me-2">Sizes:</strong>
                            @php
                                $sizes = $product->variations->where('type', 'Size'); 
                            @endphp
                            @foreach($sizes as $size)
                                <span>{{ $size['value'] }} </span>
                                @if (!$loop->last)
                                    <span>, </span>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    @endif

                    @if($product->variations->where('type', 'Color')->isNotEmpty())
                    <div class="row mb-2">
                        <div class="col-12 d-flex align-items-center"><strong>Colors:</strong>
                            @php
                                $colors = $product->variations->where('type', 'Color');
                            @endphp
                            @foreach($colors as $index => $color)
                                <span class="ms-3">{{ $color['value'] }}</span> 
                                <span style="background-color: {{ $color['value'] }}; width: 20px; height: 20px; border: 1px solid #e8ebec; display: inline-block; border-radius: 50%; margin-left: 5px;"></span>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    @if($product->variations->where('type', 'Material')->isNotEmpty())
                    <div class="row mb-2">
                        <div class="col-12"><strong class="me-2">Material:</strong>
                            @php
                                $materials = $product->variations->where('type', 'Material'); 
                            @endphp
                            @foreach($materials as $material)
                                <span>{{ $material['value'] }} </span>
                                @if (!$loop->last)
                                    <span>, </span>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</main>


@endsection
