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
    <div class="row checkout-summary-container">
      <!-- Checkout -->
      <div class="col-md-8 mb-4">
        <div class="card shadow-0 border checkout-card">
          <div class="p-4">
            <h5 class="card-title mb-3" style="color:red">Billing Details</h5>
            <div class="row">
              <div class="col-6 mb-3">
                <p class="mb-0">First name</p>
                <div class="form-outline">
                  <input type="text" id="typeText" placeholder="" class="form-control" />
                </div>
              </div>

              <div class="col-6">
                <p class="mb-0">Last name</p>
                <div class="form-outline">
                  <input type="text" id="typeText" placeholder="" class="form-control" />
                </div>
              </div>

              <div class="col-6 mb-3">
                <p class="mb-0">Phone</p>
                <div class="form-outline">
                  <input type="tel" id="typePhone" value=" " class="form-control" />
                </div>
              </div>

              <div class="col-6 mb-3">
                <p class="mb-0">Email</p>
                <div class="form-outline">
                  <input type="email" id="typeEmail" placeholder="" class="form-control" />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 mb-3">
                <p class="mb-0">Company Name (Optional)</p>
                <div class="form-outline">
                  <input type="text" id="typeText" placeholder="" class="form-control" />
                </div>
              </div>
              </div>

            

            
              <div class="col-sm-12 mb-3">
                <p class="mb-0">Street Address</p>
                <div class="form-outline">
                  <input type="text" id="typeText" placeholder="" class="form-control" />
                </div>
              </div>

              <div class="row">
              <div class="col-sm-12 mb-3">
                <p class="mb-0">Apartment, Suite, unit etc.(Optional)</p>
                <div class="form-outline">
                  <input type="text" id="typeText" placeholder="" class="form-control" />
                </div>
              </div>


              <div class="col-sm-4 mb-3">
                <p class="mb-0">City</p>
                <div class="form-outline">
                  <input type="text" id="typeText" placeholder="" class="form-control" />
                </div>
              </div>

              <div class="col-sm-4 col-6 mb-3">
                <p class="mb-0">Postal code</p>
                <div class="form-outline">
                  <input type="text" id="typeText" class="form-control" />
                </div>
              </div>

              <div class="col-sm-4 col-6 mb-3">
                <p class="mb-0">Zip</p>
                <div class="form-outline">
                  <input type="text" id="typeText" class="form-control" />
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
            <div class="d-flex justify-content-between">
              <p class="mb-2" style="font-weight:bold;">Product</p>
              <p class="mb-2" style="font-weight:bold;">Total</p>
            </div>
            <div class="d-flex justify-content-between">
              <p class="mb-2">Smart Watch x 1 </p>
              <p class="mb-2">Rs.1500.00</p>
            </div>

            <hr />

            <div class="d-flex justify-content-between">
              <p class="mb-2">Subtotal:</p>
              <p class="mb-2">Rs.1500.00</p>
            </div>
            <div class="d-flex justify-content-between">
              <p class="mb-2">Shipping:</p>
              <p class="mb-2">Rs.250.00</p>
            </div>
            <hr />
            <div class="d-flex justify-content-between">
              <h5 class="mb-2">Total:</h5>
              <h5 class="mb-2 fw-bold">Rs.1750.00</h5>
            </div>

            <div class="mt-3 mb-4">
              <button class="btn w-100" style="background-color:#4A2FF4; color:white;">Place Order</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
