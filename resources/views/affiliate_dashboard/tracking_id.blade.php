@extends('layouts.affiliate_main.master')

@section('content')
<style>
    .table thead {
        background-color: #f9f9f9; 
    }

    .btn-create {
        font-size: 0.8rem;
    }
</style>  

<main style="margin-top: 58px">
    <div class="container pt-4 px-4"> 
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="py-3 mb-0">Tracking ID</h3>
            <a href="#" class="btn btn-primary btn-create">Create Tracking ID</a>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="tab-pane fade show active" role="tabpanel">
                    <div class="container mt-4 mb-4">
                        <div class="table-responsive">
                            <table class="table table-hover text-nowrap table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Tracking ID</th>
                                        <th scope="col">Generation Time</th>
                                        <th scope="col">Operation</th>
                                    </tr>
                                </thead>
                                <tbody id="incomeTableBody">
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
