@extends('layouts.admin_main.master')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

<style>
   .table thead {
        background-color: #f9f9f9; 
    }

    .action-buttons  {
        padding: 5px;
        width:35px;
    }
</style>  

<main style="margin-top: 58px">
    <div class="container pt-4 px-4"> 
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="py-3 mb-0">Orders</h3>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="container mt-4 mb-4">
                    <div class="table-responsive">
                        <table id="orderTable" class="table table-hover text-nowrap ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Contact No.</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col" style="width: 15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>12345</td>
                                    <td>John Doe</td>
                                    <td>2024-08-28</td>
                                    <td>071 6280393</td>
                                    <td>Completed</td>
                                    <td>Rs 100.00</td>
                                    <td class="action-buttons">
                                        <a href="{{ route('order-details') }}" class="btn btn-success btn-sm">
                                            <i class="fas fa-file"></i></a>
                                        <form action="" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i></button>
                                        </form>
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
    $(document).ready(function() {
        $('#orderTable').DataTable({
            "paging": true,
            "searching": true,
            "info": true,
            "lengthChange": true,
            "pageLength": 10,
            "columnDefs": [
                { "orderable": false, "targets": 7 } 
            ],
            "language": {
                "paginate": {
                    "previous": "<i class='fas fa-chevron-left'></i>",
                    "next": "<i class='fas fa-chevron-right'></i>"
                }
            }
        });
    });
</script>


@endsection
