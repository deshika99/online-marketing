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
                            <label>First Name</label>
                            <input type="text" class="form-control" placeholder="Enter your name" id="fname" name="fname">
                        </div>

                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" placeholder="Enter your name" id="lname" name="lname">
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
 