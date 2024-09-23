@extends('layouts.admin_main.master')

@section('content')

<style>


 

</style>  

<main style="margin-top: 58px">
    <div class="container pt-4 px-4"> 
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="py-3 mb-0">Customers</h3>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="container mt-4 mb-4">
                    <div class="table-responsive">
                        <table id="example" class="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Contact No.</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" style="width: 15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <img src="" width="40" alt="Customer Image">
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td>                                    
                                            <span class="status-badge badge bg-success">Active</span>                                     
                                            <span class="status-badge badge bg-danger">Inactive</span>                                      
                                    </td>
                                    <td class="action-buttons">
                                        <button class="btn btn-info btn-sm view-btn" style="font-size: 0.75rem; padding: 0.25rem 0.5rem;">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                          
                            </tbody>
                        </table>   
                    </div>
                </div>
            </div>
        </div>


    </div>
</main>





<script>


</script>

@endsection
