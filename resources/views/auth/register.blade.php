@extends('layouts.app')

@section('content')


@if (session('status'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            toastr.success("{{ session('status') }}", 'Success', {
                positionClass: 'toast-top-right'
            });
        });
    </script>
@endif


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
                            <label for="address" class="col-md-4 col-form-label text-md-start">Address</label>
                            <div class="col-md-7">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="district" class="col-md-4 col-form-label text-md-start">District</label>
                            <div class="col-md-7">
                                <input id="district" type="text" class="form-control @error('district') is-invalid @enderror" name="district" value="{{ old('district') }}" autocomplete="district">
                                @error('district')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="DOB-day" class="col-md-4 col-form-label text-md-start">Date Of Birth</label>
                            <div class="col-md-7 d-flex">
                                <input id="DOB-day" type="number" class="form-control me-2 @error('DOB_day') is-invalid @enderror" name="DOB_day" placeholder="Day" value="{{ old('DOB_day') }}" required min="1" max="31">
                                @error('DOB_day')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input id="DOB-month" type="number" class="form-control me-2 @error('DOB_month') is-invalid @enderror" name="DOB_month" placeholder="Month" value="{{ old('DOB_month') }}" required min="1" max="12">
                                @error('DOB_month')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input id="DOB-year" type="number" class="form-control @error('DOB_year') is-invalid @enderror" name="DOB_year" placeholder="Year" value="{{ old('DOB_year') }}" required min="1900" max="{{ date('Y') }}">
                                @error('DOB_year')
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
                            <div class="col-md-7 position-relative">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password position-absolute" style="top: 15px; right: 20px; cursor: pointer;"></span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-5">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-start">{{ __('Confirm Password') }}</label>
                            <div class="col-md-7 position-relative">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <span toggle="#password-confirm" class="fa fa-fw fa-eye field-icon toggle-password position-absolute" style="top: 15px; right: 20px; cursor: pointer;"></span>
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                            <label for="bank_name" class="col-md-4 col-form-label text-md-start">Bank</label>
                            <div class="col-md-7">
                                <select id="bank_name" class="form-control" name="bank_name">
                                    <option value="" disabled selected></option>
                                    <option value="Bank 1">BOC</option>
                                    <option value="Bank 2">People's Bank</option>
                                    <option value="Bank 3">Commercial</option>
                                    <option value="Bank 3">HNB</option>
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


<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.toggle-password').forEach(item => {
            item.addEventListener('click', function() {
                const inputSelector = this.getAttribute('toggle');
                const input = document.querySelector(inputSelector);
                
                if (input) {
                    if (input.type === 'password') {
                        input.type = 'text';
                        this.classList.remove('fa-eye');
                        this.classList.add('fa-eye-slash');
                    } else {
                        input.type = 'password';
                        this.classList.remove('fa-eye-slash');
                        this.classList.add('fa-eye');
                    }
                } else {
                    console.error(`Input field with selector ${inputSelector} not found.`);
                }
            });
        });
    });
</script>

@endsection
