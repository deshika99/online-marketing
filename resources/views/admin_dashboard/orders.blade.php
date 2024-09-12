@extends('layouts.admin_main.master')

@section('content')

<style>

    .action-buttons  {
        padding: 5px;
        width: 35px;
    }

    .tab-content .table {
        margin-top: 20px;
    }
</style>

<main style="margin-top: 58px">
    <div class="container pt-4 px-4"> 
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center">
            <h3 class="py-3 mb-0">Manage Orders</h3>
        </div>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="all-orders-tab" data-bs-toggle="tab" href="#all-orders" role="tab" aria-controls="all-orders" aria-selected="true">All Orders</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="ongoing-tab" data-bs-toggle="tab" href="#ongoing" role="tab" aria-controls="ongoing" aria-selected="false">Ongoing</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="dispatched-tab" data-bs-toggle="tab" href="#dispatched" role="tab" aria-controls="dispatched" aria-selected="false">Dispatched</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="delivered-tab" data-bs-toggle="tab" href="#delivered" role="tab" aria-controls="delivered" aria-selected="false">Delivered</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="cancelled-tab" data-bs-toggle="tab" href="#cancelled" role="tab" aria-controls="cancelled" aria-selected="false">Cancelled</a>
            </li>
        </ul>

        <!-- All orders -->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="all-orders" role="tabpanel" aria-labelledby="all-orders-tab">
                <div class="card mt-1">
                    <div class="card-body">
                        <div class="container mt-1 mb-4">
                            <div class="table-responsive">
                            <table id="example" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Order ID</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col" style="width: 15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->order_code }}</td>
                                        <td>{{ $order->customer_fname }} {{ $order->customer_lname }}</td>
                                        <td>{{ $order->date }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>{{ $order->total_cost }}</td>
                                        <td class="action-buttons">
                                            <button class="btn btn-info btn-sm" onclick="setOrderCode('{{ $order->order_code }}')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <form id="delete-form-{{ $order->id }}" action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm "  onclick="confirmDelete('delete-form-{{ $order->id }}', 'you want to delete this Order?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


             <!-- dispatched -->
                <div class="tab-pane fade" id="dispatched" role="tabpanel" aria-labelledby="dispatched-tab">
                    <div class="card mt-1">
                        <div class="card-body">
                            <div class="container mt-1 mb-4">
                                <div class="table-responsive">
                                    <table id="example1" class="table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Order ID</th>
                                                <th scope="col">Customer</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col" style="width: 15%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                                
                                        </tbody>
                                    </table>   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            <!-- ongoing -->
            <div class="tab-pane fade" id="ongoing" role="tabpanel" aria-labelledby="ongoing-tab">
                <div class="card mt-1">
                        <div class="card-body">
                            <div class="container mt-1 mb-4">
                                <div class="table-responsive">
                                    <table id="example2" class="table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Order ID</th>
                                                <th scope="col">Customer</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col" style="width: 15%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>   
                                </div>
                            </div>
                        </div>
                    </div>
            </div>


            <!-- delivered -->
            <div class="tab-pane fade" id="delivered" role="tabpanel" aria-labelledby="delivered-tab">
                <div class="card mt-1">
                        <div class="card-body">
                            <div class="container mt-1 mb-4">
                                <div class="table-responsive">
                                    <table id="example3" class="table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Order ID</th>
                                                <th scope="col">Customer</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col" style="width: 15%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>   
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <!-- cancelled -->
            <div class="tab-pane fade" id="cancelled" role="tabpanel" aria-labelledby="cancelled-tab">
                <div class="card mt-1">
                        <div class="card-body">
                            <div class="container mt-1 mb-4">
                                <div class="table-responsive">
                                    <table id="example4" class="table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Order ID</th>
                                                <th scope="col">Customer</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col" style="width: 15%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>   
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

        </div>
    </div>
</main>

<script>
function setOrderCode(orderCode) {
    fetch('{{ route('set-order-code') }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ order_code: orderCode })
    }).then(response => {
        if (response.ok) {
            window.location.href = '{{ route('customerorder_details') }}';
        } else {
            alert('Failed to set order code');
        }
    });
}
</script>
@endsection
