@extends('layouts.admin_main.master')

@section('content')

<style>
    .table thead {
        background-color: #f9f9f9; 
    }

    .btn-create {
        font-size: 0.8rem;
    }

    .action-buttons a {
        margin-right: 5px;
    }

    .btn-approve {
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 3px;
    }

    .btn-reject {
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 3px;
    }

    .status-approved {
        color: blue;
        font-weight: bold;
    }

    .status-rejected {
        color: red;
        font-weight: bold;
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
            <h3 class="py-3 mb-0">Affiliate Customers</h3>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="container mt-4 mb-4">
                    <div class="table-responsive">
                        <table id="customerTable" class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">NIC</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Contact No</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($aff_customer as $index => $customer)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->NIC }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td>{{ $customer->gender }}</td>
                                    <td>{{ $customer->contactno }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td class="status">
                                        @if (is_null($customer->status))
                                            <form action="{{ route('aff_customers.updateStatus', $customer->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" name="status" value="approved" class="btn-approve btn btn-success">Approve</button>
                                                <button type="submit" name="status" value="rejected" class="btn-reject btn btn-danger">Reject</button>
                                            </form>
                                        @elseif ($customer->status == 'approved')
                                            <span class="text-primary">Approved</span>
                                        @elseif ($customer->status == 'rejected')
                                            <span class="text-danger">Rejected</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection