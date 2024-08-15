@extends('layouts.affiliate_main.master')

@section('content')
<style>
    .table thead {
        background-color: #f9f9f9; 
    }

    .form-controls {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

   .form-label{
    width:100px;
   }
    .form-controls .btn {
        font-size: 10px;
    }
</style>  

<main style="margin-top: 58px">
    <div class="container pt-4 px-4"> 
        <h3 class="py-3">Live Order Tracking</h3>

        <div class="card">
            <div class="card-body">
                <div class="tab-pane fade show active" role="tabpanel">
                    <div class="row align-items-center mb-2 ms-2">
                        <div class="col-md-4 mb-2 d-flex align-items-center">
                            <label for="country" class="form-label me-2 mb-0" style="font-size: 0.8rem;">Date Type</label>
                            <select id="country" class="form-select" style="font-size: 0.8rem;">
                                <option selected>Select type</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-2 d-flex align-items-center">
                            <label for="date" class="form-label mb-0" style="font-size: 0.8rem;">Date</label>
                            <input type="date" id="date" class="form-control" style="font-size: 0.8rem;">
                        </div>
                        <div class="col-md-4 mb-2 d-flex align-items-center">
                            <label for="tracking_id" class="form-label me-2 mb-0" style="font-size: 0.8rem;">Tracking ID</label>
                            <select id="tracking_id" class="form-select" style="font-size: 0.8rem;">
                                <option selected>Select Tracking ID</option>
                                <option value="1">Tracking ID 1</option>
                                <option value="2">Tracking ID 2</option>
                            </select>
                        </div>
                    </div>

                    <div class="row align-items-center mb-3 ms-2">
                        <div class="col-md-4 mb-2 d-flex align-items-center">
                            <label for="order_id" class="form-label me-2 mb-0" style="font-size: 0.8rem;">Order ID</label>
                            <input type="text" id="order_id" class="form-control" style="font-size: 0.8rem;">
                        </div>
                        <div class="col-md-4 mb-2 d-flex align-items-center">
                            <label for="order_platform" class="form-label me-2 mb-0" style="font-size: 0.8rem;">Order Platform</label>
                            <select id="order_platform" class="form-select" style="font-size: 0.8rem;">
                                <option selected>Select Platform</option>
                                <option value="1">All</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-2 d-flex align-items-center">
                            <label for="country" class="form-label me-2 mb-0" style="font-size: 0.8rem;">Country</label>
                            <select id="country" class="form-select" style="font-size: 0.8rem;">
                                <option selected>Select Country</option>
                                <option value="US">United States</option>
                                <option value="CN">China</option>
                                <option value="DE">Germany</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-controls mb-3 ms-3">
                        <button class="btn btn-primary">View report</button>
                        <button class="btn btn-secondary">Reset</button>
                    </div>

                    <div class="container mt-5 mb-4">
                        <div class="table-responsive">
                            <table class="table table-hover text-nowrap table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Platform</th>
                                    <th scope="col">Tracking ID</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">Clicks</th>
                                    <th scope="col">Page Views</th>
                                    <th scope="col">Unique Visitors</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>  
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
