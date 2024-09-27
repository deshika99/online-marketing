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
        <button class="tab-button mb-1" data-target="to-pay-orders">To Pay</button>
        <button class="tab-button mb-1" data-target="in-progress-orders">In Progress</button>
        <button class="tab-button" data-target="shipped-orders">Shipped</button>
        <button class="tab-button" data-target="delivered-orders">Delivered</button>
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

<!-- All Orders Tab -->
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
                <!-- Action Buttons -->
                <div style="text-align: right; margin-top: 5px;">
                        @if($order->status === 'Pending')
                            <a href="{{ route('payment', ['order_code' => $order->order_code]) }}" class="btn btn-primary btn-pay">Pay</a>
                            <br>
                            <a href="#" class="btn-cancel mt-1" onclick="openCancelModal('{{ $order->order_code }}')">Cancel</a>
                        @elseif($order->status === 'In Progress')
                        <a href="#" class="btn-cancel mt-1" onclick="openCancelModal('{{ $order->order_code }}')">Cancel</a>
                        @elseif($order->status === 'Paid')
                        <a href="#" class="btn-cancel mt-1" onclick="openCancelModal('{{ $order->order_code }}')">Cancel</a>
                        @elseif($order->status === 'Shipped')
                            <a href="javascript:void(0);" class="btn-confirm" onclick="openConfirmDeliveryModal('{{ $order->order_code }}')">Confirm Delivery</a>
                            <br>
                            <a href="#" class="btn-cancel mt-1" onclick="openCancelModal('{{ $order->order_code }}')">Cancel</a>
                        @endif
                    </div>
            </div>
        </div>
    @endforeach
</div>


<!-- To Pay Orders Tab -->
<div id="to-pay-orders" class="tab-content">
    @foreach($pendingOrders as $order)
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
                <div style="text-align: right; margin-top: 10px;">
                    <a href="{{ route('payment', ['order_code' => $order->order_code]) }}" class="btn btn-primary btn-pay">Pay</a>
                    <br>
                    <a href="#" class="btn-cancel mt-1" onclick="openCancelModal('{{ $order->order_code }}')">Cancel</a>
                </div>
            </div>
          
        </div>
    @endforeach
</div>





<!-- Shipped Orders Tab -->
<div id="shipped-orders" class="tab-content">
    @foreach($shippedOrders as $order)
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

                <div style="text-align: right; margin-top: 5px;">
                    <a href="javascript:void(0);" class="btn-confirm" onclick="openConfirmDeliveryModal('{{ $order->order_code }}')">Confirm Delivery</a>
                    <br>
                    <a href="#" class="btn-cancel mt-1" onclick="openCancelModal('{{ $order->order_code }}')">Cancel</a>
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
                    <div style="text-align: right; margin-top: 10px;">
                        <a href="#" class="btn-cancel mt-1" onclick="openCancelModal('{{ $order->order_code }}')">Cancel</a>
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



<!-- cancel Confirmation Modal -->
<div class="modal fade" id="cancel-confirmation-modal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirm Cancellation</h5>
            </div>
            <div class="modal-body">
                Are you sure you want to cancel this order?
            </div>
            <div class="modal-footer">
                <button type="button" id="confirm-cancel" class="btn btn-success" style="font-size: 13px">Confirm</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" style="font-size: 13px">Cancel</button>
            </div>
        </div>
    </div>
</div>


<!-- Confirm Delivery Modal -->
<div class="modal fade" id="confirmDeliveryModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeliveryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeliveryModalLabel">Confirm Delivery</h5>
            </div>
            <div class="modal-body" id="confirmDeliveryMessage">
                Are you sure you want to confirm delivery for this order?
            </div>
            <div class="modal-footer">
                <button type="button" id="confirmDeliveryBtn" class="btn btn-success" style="font-size: 13px">Confirm</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" style="font-size: 13px">Cancel</button>
            </div>
        </div>
    </div>
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
<script>
let orderToCancel = '';

function openCancelModal(orderCode) {
    orderToCancel = orderCode;
    $('#cancel-confirmation-modal').modal('show'); 
}

document.getElementById('confirm-cancel').onclick = function() {
    updateOrderStatus(orderToCancel, 'Cancelled');
};

function updateOrderStatus(orderCode, status) {
    fetch(`/order/cancel/${orderCode}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ status: status })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert('Failed to cancel the order. Please try again.');
        }
    })
    .catch(error => console.error('Error:', error));
}

</script>
<script>
    let selectedOrderCode;

function openConfirmDeliveryModal(orderCode) {
    selectedOrderCode = orderCode;
    $('#confirmDeliveryModal').modal('show');
}

$('#confirmDeliveryBtn').on('click', function() {
    $.ajax({
        url: '{{ route("confirm-delivery") }}',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            order_code: selectedOrderCode
        },
        success: function(response) {
            if (response.success) {
                $('#confirmDeliveryMessage').html(`
                    <p>Delivery confirmed! Would you like to leave a review?</p>
                    <a href="/leave-review-page" class="btn btn-primary" style="font-size: 13px">Leave a Review</a>
                `);
                $('.modal-footer').html('');
            } else {
                alert('Failed to confirm delivery. Please try again.');
            }
        },
        error: function() {
            alert('An error occurred. Please try again.');
        }
    });
});




</script>


@endsection
