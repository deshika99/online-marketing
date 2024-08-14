@extends('layouts.admin_main.master')

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
            <h3 class="py-3 mb-0">Products</h3>
            <a href="{{ route('add_products') }}" class="btn btn-primary btn-create">Add Products</a>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="tab-pane fade show active" role="tabpanel">
                    <div class="container mt-4 mb-4">
                        <div class="table-responsive">
                            <table class="table table-hover text-nowrap table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Normal Price</th>
                                    </tr>
                                </thead>
                                <tbody id="incomeTableBody">
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
