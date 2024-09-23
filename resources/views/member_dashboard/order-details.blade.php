@extends('layouts.user_sidebar')

@section('dashboard-content')

<style>
    .card-order {
        margin: 10px; /* Reduce margin to bring cards closer */
        padding: 15px;
        display: flex; /* Enable flexbox to align items */
        flex-direction: column; /* Stack children vertically */
        justify-content: space-between; /* Space items evenly */
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
</style>


    <h4 class="py-2 px-4">Order Details</h4>
    <h6 class="px-4">Order ID:</h6>
    <h6 class="px-4">5 items</h6>

    <div class="orderdetail-cards-row mt-2">
        <div class="card card-order" style="height: 150px; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);">
            <div class="card-title">Customer Details</div>
            <div class="card-body p-0">
                <p class="mb-1">Name: </p>
                <p class="mb-1">Email:</p>
                <p class="mb-1">Contact No.:</p>
            </div>
        </div>

        <div class="card card-order" style="height: 150px; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);">
            <div class="card-title">Shipping Details</div>
            <div class="card-body p-0">
                <p class="mb-0">Shipping Address: </p>
                <p class="mb-0">City: </p>
                <p class="mb-0">Postal Code:</p>
            </div>
        </div>
    </div>
@endsection
