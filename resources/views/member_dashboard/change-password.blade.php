@extends('layouts.user_sidebar')

@section('dashboard-content')

<h3 class="py-2 px-2">Change Password</h3>
<div class="container p-3">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('password.update') }}" method="POST">
    @csrf
        
        <div class="mb-3 position-relative">
            <label for="current_password" class="form-label">Current Password</label>
            <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Current password">
            @error('current_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        
        <div class="mb-3 position-relative">
            <label for="new_password" class="form-label">New Password</label>
            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New password">
            @error('new_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        
        <div class="mb-3 position-relative">
            <label for="new_password_confirmation" class="form-label">Retype New Password</label>
            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" placeholder="Retype new password">
            @error('new_password_confirmation')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        
        <button type="submit" class="btn btn-primary mt-3">Change Password</button>
    </form>
</div>


<script>
    document.querySelectorAll('.toggle-password').forEach(item => {
        item.addEventListener('click', function () {
            const input = document.querySelector(this.getAttribute('toggle'));
            if (input.type === 'password') {
                input.type = 'text';
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            } else {
                input.type = 'password';
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            }
        });
    });
</script>

@endsection
