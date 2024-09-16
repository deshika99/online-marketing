@extends('layouts.admin_main.master')

@section('content')

<style>
  
</style>

<main style="margin-top: 58px">
    <div class="container py-4 px-4">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="py-2 mb-0 ms-4">Edit User</h4>
        </div>
        <div class="card-container px-4">
            <div class="card py-3 px-5">
                <div class="card-body">
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="Name">Name</label>
                            <input type="text" name="Name" class="form-control" value="{{ $user->name }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="contact">Contact</label>
                            <input type="text" name="contact" class="form-control" value="{{ $user->phone_num }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="role">Role</label>
                            <select name="role" class="form-control">
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}>Customer</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="userImage">User Image</label><br>
                            <input type="file" name="userImage" class="form-control-file">
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input type="hidden" name="status" value="0">
                            <input class="form-check-input" type="checkbox" name="status" value="1" {{ $user->status == 'Active' ? 'checked' : '' }}>
                            <label class="form-check-label" for="status">Status</label>
                        </div>
                        <button type="submit" class="btn btn-success">Update User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>



@endsection
