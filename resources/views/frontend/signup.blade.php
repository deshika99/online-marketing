@extends ('frontend.master')

@section('content')

<!-- Start Page Title -->
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2>My Account</h2>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li>Signup</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title -->

<!-- Start SignUP Area -->
<section class="signup-area ptb-100">
    <div class="container">
        <div class="signup-content">
            <h2>Create an Account</h2>

            <form class="signup-form" method="POST" action="{{ route('signup') }}">
                @csrf

                <!-- First Name -->
                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" class="form-control @error('first-name') is-invalid @enderror" id="fname" name="fname" placeholder="Enter your first name" value="{{ old('fname') }}" required>
                    @error('first-name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- Last Name -->
                <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control @error('last-name') is-invalid @enderror" id="lname" name="lname" placeholder="Enter your last name" value="{{ old('lname') }}" required>
                    @error('last-name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- Address -->
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Enter your address" value="{{ old('address') }}" required>
                    @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- District -->
                <div class="form-group">
                    <label for="district">District</label>
                    <input type="text" class="form-control @error('district') is-invalid @enderror" id="district" name="district" placeholder="Enter your district" value="{{ old('district') }}" required>
                    @error('district')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- Date of Birth -->
                <div class="form-group">
                    <label for="DOB">Date of Birth</label>
                    <input type="date" class="form-control @error('DOB') is-invalid @enderror" id="DOB" name="DOB" value="{{ old('DOB') }}" required>
                    @error('DOB')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- Phone Number -->
                <div class="form-group">
                    <label for="phone_num">Phone Number</label>
                    <input type="tel" class="form-control @error('phone_num') is-invalid @enderror" id="phone_num" name="phone_num" placeholder="Enter your phone number" value="{{ old('phone_num') }}" required>
                    @error('phone_num')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your password" required>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required>
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- Show Password Checkbox -->
                <div class="form-group d-flex align-items-center">
                    <input type="checkbox" id="show_password" onclick="togglePassword()" style="transform: scale(1.3)" > 
                    <span for="show_password" class="mx-2" style="font-size: 17px; font-weight:500">Show Password</span>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="default-btn" aria-label="Sign Up">Signup</button>

                <a href="{{ route('home') }}" class="return-store">or Return to Store</a>
            </form>
        </div>
    </div>
</section>
<!-- End SignUP Area -->

<!-- Start Facility Area -->
<section class="facility-area pb-70">
    <div class="container">
        <div class="facility-slides owl-carousel owl-theme">
            <div class="single-facility-box">
                <div class="icon">
                    <i class='flaticon-tracking'></i>
                </div>
                <h3>Free Shipping Worldwide</h3>
            </div>

            <div class="single-facility-box">
                <div class="icon">
                    <i class='flaticon-return'></i>
                </div>
                <h3>Easy Return Policy</h3>
            </div>

            <div class="single-facility-box">
                <div class="icon">
                    <i class='flaticon-shuffle'></i>
                </div>
                <h3>7 Day Exchange Policy</h3>
            </div>

            <div class="single-facility-box">
                <div class="icon">
                    <i class='flaticon-sale'></i>
                </div>
                <h3>Weekend Discount Coupon</h3>
            </div>

            <div class="single-facility-box">
                <div class="icon">
                    <i class='flaticon-credit-card'></i>
                </div>
                <h3>Secure Payment Methods</h3>
            </div>

            <div class="single-facility-box">
                <div class="icon">
                    <i class='flaticon-location'></i>
                </div>
                <h3>Track Your Package</h3>
            </div>

            <div class="single-facility-box">
                <div class="icon">
                    <i class='flaticon-customer-service'></i>
                </div>
                <h3>24/7 Customer Support</h3>
            </div>
        </div>
    </div>
</section>
<!-- End Facility Area -->

<script>
    function togglePassword() {
        var passwordField = document.getElementById("password");
        var confirmPasswordField = document.getElementById("password_confirmation");

        // Toggle visibility of password fields
        if (document.getElementById("show_password").checked) {
            passwordField.type = "text";
            confirmPasswordField.type = "text";
        } else {
            passwordField.type = "password";
            confirmPasswordField.type = "password";
        }
    }
</script>

@endsection
