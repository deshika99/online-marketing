@extends('layouts.app')

@section('content')

<style>
  body {
    background-color: #fafafa; 
  }

  .card {
    border-radius: 0; 
    width: 90%;
  }

  .thank-you-section {
    display: flex;
    justify-content: center; 
    align-items: center;

  }

  .card-container {
    display: flex;
    justify-content: center; 
    align-items: center; 

  }
</style>

<div class="container mt-4">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page" id="breadcrumb-product">Thank You</li>
    </ol>
  </nav>

  <section class="thank-you-section">
    <!-- Payment -->
    <div class="col-md-12 mb-4 card-container">
      <div class="card shadow-0 border">
        @csrf
        <div class="p-4 text-center">
          <h4 style="color: orange;">Thank You for Your Purchase!</h4>
          <h6 class="mt-4">Your order has been confirmed. Your order code is: <strong>{{ $order_code }}</strong></h6>
          <p class="mt-4">Please have this amount ready on the delivery day.</p>
          <h5 style="color: orange;">Rs.{{ $total_cost }}</h5>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection