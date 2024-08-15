@extends('layouts.affiliate_main.master')

@section('content')
<style>
   

    .table thead{
        background-color: #f9f9f9; 
    }

  
</style>  

<main style="margin-top: 58px">
    <div class="container pt-4 px-4"> 
        <h3 class="py-3">Withdrawals</h3>

            <div class="col-xl-3 col-sm-6 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <p class="mb-3">Account Balance</p>
                        <h3 class="mb-4">LKR 0.00</h3>                  
                        <button class="btn btn-secondary">Withdraw</button>             
                    </div>
                </div>
            </div>

        <div class="card">
            <div class="card-body">
                <div class="tab-pane fade show active" role="tabpanel">
                    <div class="row align-items-center mb-3">
                        <div class="col-md-4 mb-2 d-flex align-items-center">
                            <input type="date" id="date" class="form-control" style="font-size: 0.8rem;">
                        </div>
                    </div>

                    <div class="container mt-4 mb-4">
                        <div class="table-responsive">
                            <table class="table table-hover text-nowrap table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Time</th>
                                    <th scope="col">Transfer Channel</th>
                                    <th scope="col">Account Number</th>
                                    <th scope="col">Withdrawal Amount</th>
                                    <th scope="col">Processing Fee</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Remark</th>
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

            <!-- Card Footer -->
            <div class="card-footer d-flex justify-content-between align-items-center">
                <span>Total: 0</span>
                <div class="d-flex align-items-center">
                    <label for="items-per-page" class="form-label me-2 mb-0">Items per page:</label>
                    <select id="items-per-page" class="form-select items-per-page" style="font-size: 0.8rem; width: auto;">
                        <option value="2">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                    </select>
                </div>
                <!-- Pagination controls -->
                <nav aria-label="Page navigation">
                    <ul class="pagination mb-0">
                        <li class="page-item disabled"><a class="page-link" href="#"><i class="fa-solid fa-arrow-left"></i></a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#"><i class="fa-solid fa-arrow-right"></i></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</main>

@endsection
