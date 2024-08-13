@extends('layouts.app')

@section('content')
<style>
    .card-body {
        flex-direction: column;
        align-items: center;
    }
    .form-group {
        width: 100%;
        max-width: 600px; 
    }
    
    .submit-button{
        width: 50%;
    }
</style>

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-7 mt-5">
            <div class="d-flex justify-content-center align-items-center">
                <h3>Login for Affiliate</h3>
            </div>
            <div class="card logincard p-5 mb-5">
                <div class="card-body">
                    <form method="POST" action="">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email Address<i class="text-danger">*</i></label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">Password<i class="text-danger">*</i></label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group  mb-3 text-right">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Reset your password
                                </a>
                            @endif
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary submit-button mt-2">
                                Sign In
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
