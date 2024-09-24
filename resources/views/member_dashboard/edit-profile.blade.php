@extends('layouts.user_sidebar')

@section('dashboard-content')

<h3 class="py-2 px-2">Edit Profile</h3>
<div class="container p-4">
    <form action="{{ route('user.updateProfile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="fullName" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="fullName" name="full_name" value="{{ old('full_name', auth()->user()->name) }}" placeholder="Enter your full name">
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" placeholder="Enter your email">
            </div>
            <div class="col-md-6 mb-3">
                <label for="mobile" class="form-label">Mobile</label>
                <input type="tel" class="form-control" id="mobile" name="phone_num" value="{{ old('phone_num', auth()->user()->phone_num) }}" placeholder="Enter your mobile number">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="birthday" class="form-label">Birthday</label>
                <input type="date" class="form-control" id="birthday" name="birthday" value="{{ old('birthday', auth()->user()->date_of_birth) }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" id="gender" name="gender">
                    <option selected disabled>Select your gender</option>
                    <option value="male" {{ auth()->user()->gender == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ auth()->user()->gender == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ auth()->user()->gender == 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
        </div>

        <!-- File upload for profile picture -->
        <div class="mb-3">
            <label for="profilePicture" class="form-label">Profile Picture</label>
            <input type="file" class="form-control" id="profilePicture" name="profile_image">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
    </form>
</div>
@endsection

