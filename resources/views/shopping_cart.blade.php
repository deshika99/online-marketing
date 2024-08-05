@extends('layouts.app')

@section('content')

<style>

body {
    background-color: #fafafa; 
  }

  .card {
    margin-bottom: 0; 
  }
  .col-lg-9 {
    padding-right: 1px; 
  }
  .col-lg-3 {
    padding-left: 1px; 
  }

    .card-body .row {
    margin-bottom: 1rem; 
  }
  

</style>


<div class="container mt-4 mb-5" >
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page" id="breadcrumb-product">Shopping Cart</li>
        </ol>
    </nav>


<section class="my-5">
  <div class="row gx-1"> 

    <!-- cart -->
    <div class="col-lg-9">
        <div class="shadow-0">
          <div class="m-3">
            <div class="row gy-3 mb-4 item-row">
              <div class="col-lg-8 d-flex align-items-center"> 
                <input type="checkbox" class="form-check-input me-3">
                <img src="/assets/images/item1.png" class="border rounded me-3" style="width: 90px; height: 100px;" />
                <div class="">
                  <a href="#" class="nav-link"> Original Samsung Galaxy Watch 46mm Classic Black/Silver</a>
                  <p class="text-muted">Black, Watch</p>
                </div>
              </div>
              <div class="col-lg-2 d-flex flex-column align-items-start">
                <div class="d-flex flex-column align-items-start">
                  <p class="text-orange h5 mb-0 mt-3">Rs. 1200</p>
                  <div class="d-flex">
                    <a href="#!" class="btn btn-light btn-no-border icon-hover-primary"><i class="fas fa-heart fa-lg text-secondary"></i></a>
                    <a href="#" class="btn btn-light btn-no-border icon-hover-danger"><i class="fas fa-trash fa-lg text-secondary"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 d-flex align-items-center justify-content-end">
                <div class="input-group mb-3 quantity-input">
                  <button class="btn btn-white" type="button" id="button-minus">
                    <i class="fas fa-minus"></i>
                  </button>
                  <input type="text" class="form-control text-center" id="quantity" value="1" aria-label="Quantity" />
                  <button class="btn btn-white" type="button" id="button-plus">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
              </div>
            </div>

            <div class="row gy-3 mb-4 item-row">
              <div class="col-lg-8 d-flex align-items-center"> 
                <input type="checkbox" class="form-check-input me-3">
                <img src="/assets/images/item1.png" class="border rounded me-3" style="width: 90px; height: 100px;" />
                <div class="">
                  <a href="#" class="nav-link"> Original Samsung Galaxy Watch 46mm Classic Black/Silver</a>
                  <p class="text-muted">Black, Watch</p>
                </div>
              </div>
              <div class="col-lg-2 d-flex flex-column align-items-start">
                <div class="d-flex flex-column align-items-start">
                  <p class="text-orange h5 mb-0 mt-3">Rs. 1200</p>
                  <div class="d-flex">
                    <a href="#!" class="btn btn-light btn-no-border icon-hover-primary"><i class="fas fa-heart fa-lg text-secondary"></i></a>
                    <a href="#" class="btn btn-light btn-no-border icon-hover-danger"><i class="fas fa-trash fa-lg text-secondary"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 d-flex align-items-center justify-content-end">
                <div class="input-group mb-3 quantity-input">
                  <button class="btn btn-white" type="button" id="button-minus">
                    <i class="fas fa-minus"></i>
                  </button>
                  <input type="text" class="form-control text-center" id="quantity" value="1" aria-label="Quantity" />
                  <button class="btn btn-white" type="button" id="button-plus">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
              </div>
            </div>

            <div class="row gy-3 mb-4 item-row">
              <div class="col-lg-8 d-flex align-items-center"> 
                <input type="checkbox" class="form-check-input me-3">
                <img src="/assets/images/item1.png" class="border rounded me-3" style="width: 90px; height: 100px;" />
                <div class="">
                  <a href="#" class="nav-link"> Original Samsung Galaxy Watch 46mm Classic Black/Silver</a>
                  <p class="text-muted">Black, Watch</p>
                </div>
              </div>
              <div class="col-lg-2 d-flex flex-column align-items-start">
                <div class="d-flex flex-column align-items-start">
                  <p class="text-orange h5 mb-0 mt-3">Rs. 1200</p>
                  <div class="d-flex">
                    <a href="#!" class="btn btn-light btn-no-border icon-hover-primary"><i class="fas fa-heart fa-lg text-secondary"></i></a>
                    <a href="#" class="btn btn-light btn-no-border icon-hover-danger"><i class="fas fa-trash fa-lg text-secondary"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 d-flex align-items-center justify-content-end">
                <div class="input-group mb-3 quantity-input">
                  <button class="btn btn-white" type="button" id="button-minus">
                    <i class="fas fa-minus"></i>
                  </button>
                  <input type="text" class="form-control text-center" id="quantity" value="1" aria-label="Quantity" />
                  <button class="btn btn-white" type="button" id="button-plus">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>

    <!-- summary -->
    <div class="col-lg-3">
      <div class="card summary-card">
        <h5 class="p-4">Order Summary</h5>
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <p class="mb-2">SubTotal (3 items):</p>
            <p class="mb-2">Rs. 10,000</p>
          </div>
          <div class="d-flex justify-content-between">
            <p class="mb-2">Shipping Fee:</p>
            <p class="mb-2">Rs. 250</p>
          </div>
          <div class="d-flex justify-content-between">
            <p class="mb-2">Shipping Fee Discount:</p>
            <p class="mb-2">-Rs. 250</p>
          </div>
          <hr />
          <div class="d-flex justify-content-between">
            <p class="mb-2">Total:</p>
            <p class="mb-2 fw-bold" style="color:#f55b29;">Rs. 10,000</p>
          </div>
          <div class="mt-3">
            <a href="{{ route('checkout') }}" class="btn btn-checkout w-100 shadow-0 mb-2"> Proceed To checkout </a>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

</div>

<script>
document.getElementById('button-plus').addEventListener('click', function() {
  var quantityInput = document.getElementById('quantity');
  var currentValue = parseInt(quantityInput.value);
  if (!isNaN(currentValue)) {
    quantityInput.value = currentValue + 1;
  } else {
    quantityInput.value = 0;
  }
});

document.getElementById('button-minus').addEventListener('click', function() {
  var quantityInput = document.getElementById('quantity');
  var currentValue = parseInt(quantityInput.value);
  if (!isNaN(currentValue) && currentValue > 0) {
    quantityInput.value = currentValue - 1;
  } else {
    quantityInput.value = 0;
  }
});
</script>

@endsection
