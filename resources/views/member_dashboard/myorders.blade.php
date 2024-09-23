@extends('layouts.user_sidebar')

@section('dashboard-content')
<style>
.custom-select {
    border: 1px solid #ced4da; 
    border-radius: 5px; 
    padding: 4px 13px; 
    background-color: #ffffff; 
    font-size: 14px; 
    width: 150px;
    color: #495057; 
    transition: border-color 0.2s ease-in-out;
}

.custom-select:focus {
    border-color: #80bdff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.25); 
    outline: none; 
}

.custom-select option {
    color: #495057; 
}

</style>

<h4 class="py-2 px-2">My Orders</h4>

<div class="d-flex justify-content-between align-items-center mt-4">
    <div class="button-tabs">
        <button class="tab-button mb-1 active" data-target="all-orders">All Orders</button>
        <button class="tab-button mb-1 " data-target="in-progress-orders">In Progress</button>
        <button class="tab-button" data-target="delivered-orders">Delivered</button>
        <button class="tab-button" data-target="cancelled-orders">Cancelled</button>
    </div>
    <div class="order-filter ms-auto mb-3">
        <select class="form-select custom-select" aria-label="Order Time Filter">
            <option value="all" selected>All</option>
            <option value="last_year">Last Year</option>
            <option value="last_6_months">Last 6 Months</option>
            <option value="last_2_years">Last 2 Years</option>
        </select>

    </div>
</div>


<!-- All Orders -->
<div id="all-orders" class="tab-content active">
    @foreach($orders as $order)
    <div class="order-card">
        <div class="order-card-header">
            <span class="status {{ strtolower(str_replace(' ', '-', $order->status)) }}">
                {{ $order->status }}
            </span>
            <a href="{{ route('myorder-details', ['order_code' => $order->order_code]) }}" class="order-details-link">Order Details ></a>
        </div>
        <div class="order-card-body">
            <div class="order-image" style="position: relative;">
                @php
                    $firstItem = $order->items->first();
                    $productImage = $firstItem->product->images->first();
                    $additionalCount = $order->items->count() - 1;
                @endphp
                @if($productImage)
                    <img src="{{ asset('storage/' . $productImage->image_path) }}" alt="Product Image" width="50">
                @else
                    <p>No image available</p>
                @endif
                @if($additionalCount > 0)
                    <span class="additional-count" style="position: absolute; top: 58px; right: 20px; background: rgba(0, 0, 0, 0.3); color: white; padding: 5px; border-radius: 5px;">+{{ $additionalCount }}</span>
                @endif
            </div>
            <div class="order-info">
                <h6 class="order-id">Order ID: {{ $order->order_code }}</h6>
                <h6 class="order-date">Order date: {{ $order->date }}</h6>
                
                <!-- Product Summary -->
                <p class="order-summary">
                    @php
                        $itemCount = $order->items->count();
                        $itemsToShow = $order->items->take(2);
                    @endphp
                    
                    @foreach($itemsToShow as $item)
                        {{ $item->product->product_name }}{{ !$loop->last ? ' | ' : '' }}
                    @endforeach
                    
                    @if($itemCount > 2)
                        <strong style="font-weight: 500;">& {{ $itemCount - 2 }} more items</strong>
                    @endif
                </p>
                
                <h6 class="order-price">Rs {{ $order->total_cost }}</h6>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- In Progress Orders -->
<div id="in-progress-orders" class="tab-content">
    @foreach($inProgressOrders as $order)
    <div class="order-card">
        <div class="order-card-header">
            <span class="status {{ strtolower(str_replace(' ', '-', $order->status)) }}">
                {{ $order->status }}
            </span>
            <a href="{{ route('myorder-details', ['order_code' => $order->order_code]) }}" class="order-details-link">Order Details</a>
        </div>
        <div class="order-card-body">
            <div class="order-image" style="position: relative;">
                @php
                    $firstItem = $order->items->first();
                    $productImage = $firstItem->product->images->first();
                    $additionalCount = $order->items->count() - 1;
                @endphp
                @if($productImage)
                    <img src="{{ asset('storage/' . $productImage->image_path) }}" alt="Product Image" width="50">
                @else
                    <p>No image available</p>
                @endif
                @if($additionalCount > 0)
                    <span class="additional-count" style="position: absolute; top: 58px; right: 20px; background: rgba(0, 0, 0, 0.3); color: white; padding: 5px; border-radius: 5px;">+{{ $additionalCount }}</span>
                @endif
            </div>
            <div class="order-info">
                <h6 class="order-id">Order ID: {{ $order->order_code }}</h6>
                <h6 class="order-date">Order date: {{ $order->date }}</h6>
                
                <!-- Product Summary -->
                <p class="order-summary">
                    @php
                        $itemCount = $order->items->count();
                        $itemsToShow = $order->items->take(3);
                    @endphp
                    
                    @foreach($itemsToShow as $item)
                        {{ $item->product->product_name }}{{ !$loop->last ? ' | ' : '' }}
                    @endforeach
                    
                    @if($itemCount > 3)
                        <strong style="font-weight: 500;">& {{ $itemCount - 3 }} more items</strong>
                    @endif
                </p>
                
                <h6 class="order-price">Rs {{ $order->total_cost }}</h6>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Delivered Orders -->
<div id="delivered-orders" class="tab-content">
    @foreach($deliveredOrders as $order)
    <div class="order-card">
        <div class="order-card-header">
            <span class="status {{ strtolower(str_replace(' ', '-', $order->status)) }}">
                {{ $order->status }}
            </span>
            <a href="{{ route('myorder-details', ['order_code' => $order->order_code]) }}" class="order-details-link">Order Details</a>
        </div>
        <div class="order-card-body">
            <div class="order-image" style="position: relative;">
                @php
                    $firstItem = $order->items->first();
                    $productImage = $firstItem->product->images->first();
                    $additionalCount = $order->items->count() - 1;
                @endphp
                @if($productImage)
                    <img src="{{ asset('storage/' . $productImage->image_path) }}" alt="Product Image" width="50">
                @else
                    <p>No image available</p>
                @endif
                @if($additionalCount > 0)
                    <span class="additional-count" style="position: absolute; top: 58px; right: 20px; background: rgba(0, 0, 0, 0.3); color: white; padding: 5px; border-radius: 5px;">+{{ $additionalCount }}</span>
                @endif
            </div>
            <div class="order-info">
                <h6 class="order-id">Order ID: {{ $order->order_code }}</h6>
                <h6 class="order-date">Order date: {{ $order->date }}</h6>
                
                <!-- Product Summary -->
                <p class="order-summary">
                    @php
                        $itemCount = $order->items->count();
                        $itemsToShow = $order->items->take(3);
                    @endphp
                    
                    @foreach($itemsToShow as $item)
                        {{ $item->product->product_name }}{{ !$loop->last ? ' | ' : '' }}
                    @endforeach
                    
                    @if($itemCount > 3)
                        <strong style="font-weight: 500;">& {{ $itemCount - 3 }} more items</strong>
                    @endif
                </p>
                
                <h6 class="order-price">Rs {{ $order->total_cost }}</h6>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Cancelled Orders -->
<div id="cancelled-orders" class="tab-content">
    @foreach($cancelledOrders as $order)
    <div class="order-card">
        <div class="order-card-header">
            <span class="status {{ strtolower(str_replace(' ', '-', $order->status)) }}">
                {{ $order->status }}
            </span>
            <a href="{{ route('myorder-details', ['order_code' => $order->order_code]) }}" class="order-details-link">Order Details</a>
        </div>
        <div class="order-card-body">
            <div class="order-image" style="position: relative;">
                @php
                    $firstItem = $order->items->first();
                    $productImage = $firstItem->product->images->first();
                    $additionalCount = $order->items->count() - 1;
                @endphp
                @if($productImage)
                    <img src="{{ asset('storage/' . $productImage->image_path) }}" alt="Product Image" width="50">
                @else
                    <p>No image available</p>
                @endif
                @if($additionalCount > 0)
                    <span class="additional-count" style="position: absolute; top: 58px; right: 20px; background: rgba(0, 0, 0, 0.3); color: white; padding: 5px; border-radius: 5px;">+{{ $additionalCount }}</span>
                @endif
            </div>
            <div class="order-info">
                <h6 class="order-id">Order ID: {{ $order->order_code }}</h6>
                <h6 class="order-date">Order date: {{ $order->date }}</h6>
                
                <!-- Product Summary -->
                <p class="order-summary">
                    @php
                        $itemCount = $order->items->count();
                        $itemsToShow = $order->items->take(3);
                    @endphp
                    
                    @foreach($itemsToShow as $item)
                        {{ $item->product->product_name }}{{ !$loop->last ? ' | ' : '' }}
                    @endforeach
                    
                    @if($itemCount > 3)
                        <strong style="font-weight: 500;">& {{ $itemCount - 3 }} more items</strong>
                    @endif
                </p>
                
                <h6 class="order-price">Rs {{ $order->total_cost }}</h6>
            </div>
        </div>
    </div>
    @endforeach
</div>

<script>
    document.querySelectorAll('.tab-button').forEach(button => {
        button.addEventListener('click', function() {
            document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
            document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));

            this.classList.add('active');
            document.getElementById(this.getAttribute('data-target')).classList.add('active');
        });
    });
</script>

@endsection
