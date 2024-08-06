@extends('layouts.app')

@section('content')
<style>
  
</style>

<div class="container mt-4 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-3">
            <h2>Register Details</h2>
            <div class="card register-card mt-3">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-start">{{ __('Name') }}</label>
                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Address" class="col-md-4 col-form-label text-md-start">Address</label>
                            <div class="col-md-7">
                                <input id="Address" type="text" class="form-control @error('Address') is-invalid @enderror" name="Address" value="{{ old('Address') }}" required autocomplete="Address" autofocus>
                                @error('Address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="District" class="col-md-4 col-form-label text-md-start">District</label>
                            <div class="col-md-7">
                                <input id="District" type="text" class="form-control @error('District') is-invalid @enderror" name="District" value="{{ old('District') }}" required autocomplete="District" autofocus>
                                @error('District')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="DOB" class="col-md-4 col-form-label text-md-start">Date Of Birth</label>
                            <div class="col-md-7 d-flex">
                                <input id="DOB-day" type="text" class="form-control me-2 @error('DOB') is-invalid @enderror" name="DOB_day" placeholder="" value="{{ old('DOB_day') }}" required>
                                <input id="DOB-month" type="text" class="form-control me-2 @error('DOB') is-invalid @enderror" name="DOB_month" placeholder="" value="{{ old('DOB_month') }}" required>
                                <input id="DOB-year" type="text" class="form-control @error('DOB') is-invalid @enderror" name="DOB_year" placeholder="" value="{{ old('DOB_year') }}" required>
                                @error('DOB')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone_num" class="col-md-4 col-form-label text-md-start">{{ __('Phone Number') }}</label>
                            <div class="col-md-7">
                                <input id="phone_num" type="text" class="form-control @error('phone_num') is-invalid @enderror" name="phone_num" value="{{ old('phone_num') }}" required autocomplete="phone_num">
                                @error('phone_num')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-start">{{ __('Email Address') }}</label>
                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-start">{{ __('Password') }}</label>
                            <div class="col-md-7">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-5">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-start">{{ __('Confirm Password') }}</label>
                            <div class="col-md-7">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <h5>Bank Details:</h5>
                        <div class="row mb-3 mt-3">
                            <label for="acc_no" class="col-md-4 col-form-label text-md-start">Account Number</label>
                            <div class="col-md-7">
                                <input id="acc_no" type="text" class="form-control" name="acc_no">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Bank_name" class="col-md-4 col-form-label text-md-start">Bank</label>
                            <div class="col-md-7">
                                <select id="Bank_name" class="form-control" name="Bank_name">
                                    <option value="" disabled selected></option>
                                    <option value="Bank 1">Bank 1</option>
                                    <option value="Bank 2">Bank 2</option>
                                    <option value="Bank 3">Bank 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <label for="branch" class="col-md-4 col-form-label text-md-start">Branch</label>
                            <div class="col-md-7">
                                <select id="branch" class="form-control" name="branch">
                                    <option value="" disabled selected></option>
                                    <option value="Branch 1">Branch 1</option>
                                    <option value="Branch 2">Branch 2</option>
                                    <option value="Branch 3">Branch 3</option>
                                </select>
                            </div>
                        </div>

                        <p>
                            I hereby confirm that all the above information is true and agree if the institution does not  
                            approve the registration of the account due to the inclusion of false information.
                        </p>
                        <div class="row submit-btn mb-0">
                            <div class="col-md-7 offset-md-4">
                                <button type="submit" class="btn btn-warning">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
