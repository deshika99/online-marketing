@extends('layouts.user_sidebar')

@section('dashboard-content')
<style>
    .button-tabs {
    margin-bottom: 20px;
}

.tab-button {
    padding: 6px 16px;
    margin-right: 10px;
    border: 1px solid #b5b7bd;
    background-color: transparent;
    color: #636566;
    cursor: pointer;
    border-radius: 25px;
}

.tab-button.active {
     border:2px solid #0056b3;
     color: #0056b3;
}

.tab-content {
    display: none;
}

.tab-content.active {
    display: block;
}
.order-card {
    border: 1px solid #e8ebec;
    border-radius: 10px;
    padding: 15px;
    margin-bottom: 20px;
}

.order-card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #e8ebec;
    padding-bottom: 10px;
    margin-bottom: 10px;
}

.status.inprogress {
    background-color: #ffedd4; 
    color: #f0ad4e; 
    padding: 4px 9px;
    border-radius: 15px;
    font-size: 12px;
}

.status.delivered {
    background-color: #d4edda; 
    color: #28a745;
    padding: 4px 9px;
    border-radius: 15px;
    font-size: 12px;
}

.status.cancelled {
    background-color: #f8d7da;
    color: #dc3545;
    padding: 4px 9px;
    border-radius: 15px;
    font-size: 12px;
}



.order-details-link {
    color: #0056b3;
    text-decoration: none;
}

.order-card-body {
    display: flex;
    align-items: center;
}

.order-image img {
    width: 90px;
    height: 90px;
    border-radius: 5px;
    margin-right: 15px;
    object-fit: contain; 
}


.order-info {
    flex-grow: 1;
}

.order-info h6,
.order-info p {
    margin: 2px 0; 
    line-height: 1.4; 
}

.order-id {
    color: #0056b3;
    font-size: 15px;
}

.order-summary {
    font-size: 14px;
}

.order-date {
    color: #666;
    font-size: 14px;
}

.order-price {
    font-size: 15px;
    font-weight: bold;
}
</style>

<h4 class="py-2 px-2">My Orders</h4>

<div class="button-tabs mt-4">
    <button class="tab-button active" data-target="all-orders">All Orders</button>
    <button class="tab-button" data-target="in-progress-orders">In Progress</button>
    <button class="tab-button" data-target="delivered-orders">Delivered</button>
    <button class="tab-button" data-target="cancelled-orders">Cancelled</button>
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
