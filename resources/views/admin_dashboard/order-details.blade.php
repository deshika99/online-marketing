@extends('layouts.admin_main.master')

@section('content')

<style>
    .card {
        margin-bottom: 20px;
        padding: 15px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        font-weight: bold;
        margin-bottom: 10px;
    }

    .order-cards-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .order-cards-row .card {
        width: 32%;
    }

    .details-cards-row {
        display: flex;
        justify-content: space-between;
    }

    .details-cards-row .item-details-card {
        width: 70%;
    }

    .details-cards-row .summary-card {
        width: 28%;
    }

    .table th, .table td {
        vertical-align: middle;
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
            <h3 class="py-3 mb-0">Order Details</h3>
        </div>

        <div class="order-cards-row">
            <div class="card">
                <div class="card-title">Customer Details</div>
                <div class="card-body">
                </div>
            </div>

            <div class="card">
                <div class="card-title">Shipping Details</div>
                <div class="card-body">
                </div>
            </div>

            <div class="card">
                <div class="card-title">Billing Details</div>
                <div class="card-body">
                </div>
            </div>
        </div>

        <!-- Cards for Item Details and Order Summary -->
        <div class="details-cards-row">
            <div class="card item-details-card">
                <div class="card-title">Item Details</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card summary-card">
                <div class="card-title">Order Summary</div>
                <div class="card-body">
                    <p>Subtotal: $XXX.XX</p>
                    <p>Delivery Charge: $XX.XX</p>
                    <hr>
                    <p><strong>Total: $XXX.XX</strong></p>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
