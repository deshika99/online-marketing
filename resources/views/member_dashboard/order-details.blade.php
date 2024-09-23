@extends('layouts.user_sidebar')

@section('dashboard-content')

<style>
    .card-order {
        margin: 10px; 
        padding: 15px;
        display: flex; 
        flex-direction: column;
        justify-content: space-between;
    }

    .card-title {
        font-weight: bold;
        margin-bottom: 10px;
    }

    .orderdetail-cards-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .orderdetail-cards-row .card {
        width: 48%; 
    }


    .order-card {
    border: 1px solid #e8ebec;
    border-radius: 10px;
    padding: 15px;
    margin-bottom: 20px;
}

</style>

<h4 class="py-2 px-4">Order Details</h4>
<h6 class="px-4">Order ID: {{ $order->order_code }}</h6>
<h6 class="px-4 order-date">Order date: {{ $order->date }}</h6>
<h6 class="px-4">{{ $order->items->count() }} items</h6>

<div class="orderdetail-cards-row mt-2 m-3">
    <div class="card card-order" style="height: auto; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); position: relative;">
        <i class="fa-solid fa-location-dot fa-2x" style="position: absolute; top: 10px; right: 20px; color: #0056b3"></i>
        <div class="card-body p-0">
            <p class="mb-1">{{ $order->customer_fname }} {{ $order->customer_lname }}</p>
            <p class="mb-1">{{ $order->email }}</p>
            <p class="mb-1">{{ $order->phone }}</p>
            <p class="mb-1">{{ $order->address }}, {{ $order->apartment }}, {{ $order->city }}</p>
            <p class="mb-1">{{ $order->postal_code }}</p>
        </div>
    </div>

    <div class="card card-order" style="height: auto; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);">
        <i class="fa-solid fa-clipboard-list fa-2x" style="position: absolute; top: 10px; right: 20px; color: #0056b3"></i>
        <div class="card-body p-0">
            <p class="mb-1">Payment Method: {{ $order->payment_method }}</p>
            <p class="mb-1">Sub Total: Rs {{ number_format($order->total_cost - 250, 2) }}</p>
            <p class="mb-1">Delivery Charge: Rs 250.00</p>
            <p class="mb-1">Total: Rs {{ number_format($order->total_cost, 2) }}</p>
        </div>
    </div>
</div>

<div class="order-items mt-3">
    <h6 class="px-4">Order Items:</h6>
    <div class="order-items-list px-3">
        @foreach($order->items as $item)
            <div class="order-item" style="display: flex; align-items: center; padding: 10px; border-bottom: 1px solid #eaeaea;">
                <div style="margin-right: 15px;">
                    @if($item->product->images->isNotEmpty())
                        <a href="{{ route('single_product_page', ['product_id' =>  $item->product->product_id]) }}"><img src="{{ asset('storage/' . $item->product->images->first()->image_path) }}" alt="Product Image" width="70" height="auto"></a>
                    @endif
                </div>
                <div style="line-height: 1.5;">
                    <span style="font-weight: 600; font-size: 15px;">{{ $item->product->product_name }}</span><br>
                    <div>
                        @if($item->color)
                        <span class="me-2">Color: <span style="font-weight: 600;">{{ $item->color ? $item->color : '-' }}</span></span> | 
                        @endif
                        @if($item->size)
                        <span class="me-2 ms-2">Size: <span style="font-weight: 600;">{{ $item->size ? $item->size : '-' }}</span></span> |
                        @endif 
                        <span class="ms-2">Qty: <span style="font-weight: 600;">{{ $item->quantity }}</span></span>
                    </div>
                    <h6 class="mt-2" style="font-weight: bold;">Rs {{ number_format($item->cost, 2) }}</h6>  
                </div>
            </div>
        @endforeach
    </div>
</div>





@endsection
