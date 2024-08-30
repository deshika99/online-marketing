@extends('layouts.admin_main.master')

@section('content')

<style>


    .form-group {
        margin-bottom: 1rem;
    }

    .form-group label {
        font-weight: 500;
    }

    .form-group input {
        border: 1px solid #ced4da;
    }

    .form-control[readonly] {
        background-color: #e9ecef;
    }

    .form-check {
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
    }

    .form-check label {
        margin-left: 10px;
    }

    .select-width {
        width: 100%;
        border: 1px solid #ced4da;
    }

    .form-control-file {
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
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
            <h3 class="py-3 mb-0">Users</h3>
            <button type="button" class="btn btn-primary btn-create" data-bs-toggle="modal" data-bs-target="#addUserModal">
                <i class="fa-solid fa-plus"></i> Add
            </button>
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
                                    <th scope="col">Role</th>
                                    <th scope="col" style="width: 15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Manushi Weerasinghe</td>
                                    <td>
                                        <img src="/assets/images/user.png" width=50 />
                                    </td>
                                    <td>manuw2819@gmail.com</td>
                                    <td>0716280393</td>
                                    <td>User</td>
                                    <td class="action-buttons">
                                        <button class="btn btn-info btn-sm view-btn" style="font-size: 0.75rem; padding: 0.25rem 0.5rem;" data-bs-toggle="modal" data-bs-target="#UserdetailsModal">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <a href="" class="btn btn-warning btn-sm" data-bs-toggle="modal" style="font-size: 0.75rem; padding: 0.25rem 0.5rem;" data-bs-target="#editUserModal"><i class="fas fa-edit"></i></a>
                                        <form action="" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" style="font-size: 0.75rem; padding: 0.25rem 0.5rem;" onclick="return confirm('Are you sure?')">
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


<!-- add user Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form id="productForm" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" id="firstName" name="firstName" class="form-control" placeholder="Enter First Name">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" id="lastName" name="lastName" class="form-control" placeholder="Enter Last Name">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="contact">Contact</label>
                            <input type="text" id="contact" name="contact" class="form-control" placeholder="Enter Contact Number">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="role">Role</label>
                            <select id="role" name="role" class="form-control select-width">
                                <option value="">Select Role</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="userImage">User Image</label><br>
                            <input type="file" id="userImage" name="userImage" class="form-control-file" style="width:100%">
                        </div>
                        <div class="form-check form-switch ms-3">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Status</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success btn-create">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- edit user Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form id="productForm" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" id="firstName" name="firstName" class="form-control" placeholder="Enter First Name">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" id="lastName" name="lastName" class="form-control" placeholder="Enter Last Name">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="contact">Contact</label>
                            <input type="text" id="contact" name="contact" class="form-control" placeholder="Enter Contact Number">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="role">Role</label>
                            <select id="role" name="role" class="form-control select-width">
                                <option value="">Select Role</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="userImage">User Image</label><br>
                            <input type="file" id="userImage" name="userImage" class="form-control-file" style="width:100%">
                        </div>
                        <div class="form-check form-switch ms-3">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Status</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success btn-create">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- User Details Modal -->
<div class="modal fade" id="UserdetailsModal" tabindex="-1" aria-labelledby="UserdetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg-10">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 class="modal-title" id="UserdetailsModalLabel">Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-user-details text-center mb-4">
                    <img src="/assets/images/user.png" class="img-fluid mb-3" alt="User Image" />
                    <h5>Manushi Weerasinghe</h5>
                    <p>USER ID #12345</p>
                </div>
                <div class="user-info">
                    <p><strong>Email:</strong> <span>manuw2819@gmail.com</span></p>
                    <p><strong>Contact No:</strong> <span>0716280393</span></p>
                    <p><strong>Role:</strong> <span>User</span></p>
                    <p><strong>Status:</strong> 
                        <span class="status-badge active">Active</span>
                    </p>
                    <p><strong>Permissions:</strong> <span></span></p>
                </div>
            </div>
        </div>
    </div>
</div>






@endsection
