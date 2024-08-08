@extends('layouts.app')

@section('content')

<style>
  body {
    background-color: #fafafa; 
  }

  .card {
    border-radius: 0; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .checkout-card {
    flex: 1; 
  }
</style>

<div class="container mt-4 mb-5">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item" aria-current="page" id="breadcrumb-product">Shopping Cart</li>
      <li class="breadcrumb-item active" aria-current="page" id="breadcrumb-product">Checkout</li>
    </ol>
  </nav>

  <section class="py-3">
    <form id="orderForm" action="{{ route('order.store') }}" method="POST">
      <div class="row checkout-summary-container">
        
        <!-- Checkout -->
        <div class="col-md-8 mb-4">
          <div class="card shadow-0 border checkout-card">
            @csrf
            <div class="p-4">
              <h5 class="card-title mb-3" style="color:red">Billing Details</h5>
              <div class="row">
                <div class="col-6 mb-3">
                  <p class="mb-0">First name</p>
                  <div class="form-outline">
                    <input type="text" name="first_name" id="typeText" placeholder="" class="form-control" />
                  </div>
                </div>
                <div class="col-6">
                  <p class="mb-0">Last name</p>
                  <div class="form-outline">
                    <input type="text" name="last_name" id="typeText" placeholder="" class="form-control" />
                  </div>
                </div>
                <div class="col-6 mb-3">
                  <p class="mb-0">Phone</p>
                  <div class="form-outline">
                    <input type="tel" name="phone" id="typePhone" value=" " class="form-control" />
                  </div>
                </div>
                <div class="col-6 mb-3">
                  <p class="mb-0">Email</p>
                  <div class="form-outline">
                    <input type="email" name="email" id="typeEmail" placeholder="" class="form-control" />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 mb-3">
                  <p class="mb-0">Company Name (Optional)</p>
                  <div class="form-outline">
                    <input type="text" name="company_name" id="typeText" placeholder="" class="form-control" />
                  </div>
                </div>
              </div>
              <div class="col-sm-12 mb-3">
                <p class="mb-0">Street Address</p>
                <div class="form-outline">
                  <input type="text" name="address" id="typeText" placeholder="" class="form-control" />
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 mb-3">
                  <p class="mb-0">Apartment, Suite, unit etc.(Optional)</p>
                  <div class="form-outline">
                    <input type="text" name="apartment" id="typeText" placeholder="" class="form-control" />
                  </div>
                </div>
                <div class="col-sm-6 mb-3">
                  <p class="mb-0">City</p>
                  <div class="form-outline">
                    <input type="text" name="city" id="typeText" placeholder="" class="form-control" />
                  </div>
                </div>
                <div class="col-sm-6 col-6 mb-3">
                  <p class="mb-0">Postal code</p>
                  <div class="form-outline">
                    <input type="text" name="postal_code" id="typeText" class="form-control" />
                  </div>
                </div>
              </div>
              <hr class="my-4" />
              <h5 class="card-title mb-3" style="color:red">Shipping Details</h5>
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1" />
                <label class="form-check-label" for="flexCheckDefault1">Ship to a different address ?</label>
              </div>
              <div class="mb-3">
                <p class="mb-0">Order notes (optional)</p>
                <div class="form-outline">
                  <textarea class="form-control" id="textAreaExample1" rows="2"></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Summary -->
        <div class="col-md-4">
          <div class="card shadow-0 border summary-card">
            <div class="p-4">
              <h5 class="mb-3">Your Order</h5>
              @forelse ($cart as $item)
                  <div class="d-flex justify-content-between">
                      <p class="mb-2">{{ $item['title'] }} x {{ $item['quantity'] ?? 1 }}</p>
                      <p class="mb-2">Rs. {{ ($item['price'] ?? 0) * ($item['quantity'] ?? 1) }}</p>
                  </div>
              @empty
                  <p>No items in the cart</p>
              @endforelse
              <hr />
              <div class="d-flex justify-content-between">
                <p class="mb-2">Subtotal:</p>
                <p class="mb-2">Rs.{{ array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart)) }}</p>
              </div>
              <div class="d-flex justify-content-between">
                <p class="mb-2">Shipping:</p>
                <p class="mb-2">Rs.250.00</p>
              </div>
              <hr />
              <div class="d-flex justify-content-between">
                <h5 class="mb-2">Total:</h5>
                <h5 class="mb-2 fw-bold">Rs. {{ array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart)) + 250 }}</h5>
              </div>
              <button type="button" class="btn w-100" data-bs-toggle="modal" data-bs-target="#confirmModal" 
              style="background-color:#4A2FF4; color:white;">Place Order</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </section>

  @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
  @endif
</div>

<!-- Confirmation Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Order Confirmation</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to place this order?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmButton">Yes, Order</button>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('confirmButton').addEventListener('click', function() {
      document.getElementById('orderForm').submit();
    });
  });
</script>

@endsection
