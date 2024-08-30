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
    <div class="container px-5 py-5"> 
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center">
            <h3 class="mb-1">Order Details</h3>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Order #12345</h5>
        </div>


        <div class="d-flex justify-content-center">
            <div class="col-8">
                <div class="container">
                <div class="card-body px-5 mt-4 mb-5">
                    <ul id="progressbar-2" class="d-flex justify-content-between mx-0 mt-0 px-0 pt-0 pb-2">
                    <li class="step0 active text-center" id="step1"></li>
                    <li class="step0 active text-center" id="step2"></li>
                    <li class="step0 active text-center" id="step3"></li>
                    <li class="step0 text-muted text-end" id="step4"></li>
                    </ul>
                    <div class="d-flex justify-content-between">
                    <div class="d-lg-flex align-items-center">
                        <i class="fas fa-clipboard-list me-lg-2 mb-lg-0"></i>
                        <div>
                        <p class="mb-0">Order Processed</p>
                        </div>
                    </div>
                    <div class="d-lg-flex align-items-center">
                        <i class="fas fa-box-open me-lg-2 mb-lg-0"></i>
                        <div>
                        <p class="mb-0">Order Dispatched</p>
                        </div>
                    </div>
                    <div class="d-lg-flex align-items-center">
                        <i class="fas fa-shipping-fast me-lg-2 mb-lg-0"></i>
                        <div>
                        <p class="mb-0">Out for delivery</p>
                        </div>
                    </div>
                    <div class="d-lg-flex align-items-center">
                        <i class="fas fa-home me-lg-2 mb-lg-0"></i>
                        <div>
                        <p class="mb-0">Order Arrived</p>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>


        <div class="order-cards-row mt-2">
            <div class="card">
                <div class="card-title">Customer Details</div>
                <div class="card-body p-0">
                    <p class="mb-1">Name: John Doe</p>
                    <p class="mb-1">Email: johndoe@gmail.com</p>
                    <p class="mb-1">Contact No.: 071 6280393</p>
                </div>
            </div>

            <div class="card">
                <div class="card-title">Shipping Details</div>
                <div class="card-body p-0">
                    <p class="mb-0">Shipping Address: No.124</p>
                    <p class="mb-0">City: Kurunegala</p>
                    <p class="mb-0">Postal Code: 60040</p>
                </div>
            </div>

            <div class="card">
                <div class="card-title">Billing Details</div>
                <div class="card-body p-0">
                    <p class="mb-0">Payment Method: Credit Card</p>
                    <p class="mb-0">Invoice Number: INV-123456</p>
                    <p class="mb-0">Amount Charged: Rs 2350.00</p>
                    <p class="mb-0">Payment Status: Completed</p>
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
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Product 01</th>
                                    <th scope="col">2</th>
                                    <th scope="col">Rs 1000.00</th>
                                    <th scope="col">Rs 2000.00</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card summary-card">
                <div class="card-title">Order Summary</div>
                <div class="card-body">
                    <p>Subtotal: Rs 2000.00</p>
                    <p>Delivery Charge: Rs 350.00</p>
                    <hr>
                    <p><strong>Total: Rs 2350.00</strong></p>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
