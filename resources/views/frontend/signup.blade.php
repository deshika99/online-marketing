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

                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" class="form-control" placeholder="Enter your name" id="name" name="name">
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input type="address" class="form-control" placeholder="Enter your address" id="address" name="address">
                        </div>

                        <div class="form-group">
                            <label>District</label>
                            <input type="district" class="form-control" placeholder="Enter your district" id="district" name="district">
                        </div>

                        <div class="form-group">
                            <label>Date Of Birth</label>
                            <div class="col-md-12 d-flex">
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

                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="phone_num" class="form-control" placeholder="Enter your phone number" id="phone_num" name="phone_num">
                            <div class="col-md-7">
                                @error('phone_num')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Enter your name" id="email" name="email">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Enter your password" id="password" name="password">
                        </div>

                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Confirm your password" id="password_confirmation" name="password_confirmation">
                        </div>


                        <button type="submit" class="default-btn">Signup</button>

                        <a href="index.html" class="return-store">or Return to Store</a>
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
@endsection
 