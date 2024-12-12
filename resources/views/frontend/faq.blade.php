@extends ('frontend.master')

@section('content')

         <!-- Start Page Title -->
        <div class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h2>Frequently Asked Question</h2>
                    <ul>
                        <li><a href="/home">Home</a></li>
                        <li>FAQ's</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Start FAQ Area -->
        <section class="faq-area ptb-100">
            <div class="container">
                <div class="tab faq-accordion-tab">
                    <ul class="tabs d-flex flex-wrap justify-content-center">
                        <li><a href="#"><i class='bx bx-flag'></i> <span>Getting Started</span></a></li>
                        
                        <li><a href="#"><i class='bx bxs-badge-dollar'></i> <span>Pricing & Plans</span></a></li>

                        <li><a href="#"><i class='bx bx-shopping-bag'></i> <span>Sales Question</span></a></li>

                        <li><a href="#"><i class='bx bx-book-open'></i> <span>Usage Guides</span></a></li>

                        <li><a href="#"><i class='bx bx-info-circle'></i> <span>General Guide</span></a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tabs-item">
                            <div class="faq-accordion">
                                <ul class="accordion">
                                    <li class="accordion-item">
                                        <a class="accordion-title active" href="javascript:void(0)">
                                            <i class='bx bx-chevron-down'></i>
                                            What shipping methods are available?
                                        </a>
        
                                        <div class="accordion-content show">
                                            <p>We offer multiple shipping methods to ensure flexibility and convenience. These include standard delivery, express shipping, and same-day delivery for select locations. Each method is designed to suit your needs and budget.</p>
                                        </div>
                                    </li>

                                    <li class="accordion-item">
                                        <a class="accordion-title" href="javascript:void(0)">
                                            <i class='bx bx-chevron-down'></i>
                                            What are shipping times and costs?
                                        </a>
        
                                        <div class="accordion-content">
                                            <p>Shipping times and costs depend on your chosen shipping method and location. Standard delivery typically takes 3-7 business days, while express options may arrive in 1-3 business days. Shipping fees are calculated based on the delivery method and your location, with free shipping often available for qualifying orders.</p>
                                        </div>
                                    </li>

                                    <li class="accordion-item">
                                        <a class="accordion-title" href="javascript:void(0)">
                                            <i class='bx bx-chevron-down'></i>
                                            What payment methods can I use?
                                        </a>
        
                                        <div class="accordion-content">
                                            <ul>
                                                <li>Credit Card: Visa, MasterCard, Discover, American Express, JCB, Visa Electron. The total will be charged to your card when the order is shipped.</li>
                                                <li>Comero features a Fast Checkout option, allowing you to securely save your credit card details so that you don't have to re-enter them for future purchases.</li>
                                                <li>PayPal: Shop easily online without having to enter your credit card details on the website. Your account will be charged once the order is completed. To register for a PayPal account, visit the website paypal.com.</li>
                                                <li>Credit Card: Visa, MasterCard, Discover, American Express, JCB, Visa Electron. The total will be charged to your card when the order is shipped.</li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li class="accordion-item">
                                        <a class="accordion-title" href="javascript:void(0)">
                                            <i class='bx bx-chevron-down'></i>
                                            Can I use my own domain name?
                                        </a>
        
                                        <div class="accordion-content">
                                            <p>Absolutely! Simply point your domain directly to your new OMC. You do not need to use a subdomain or any other temporary domain name placeholder.</p>
                                        </div>
                                    </li>

                                    <li class="accordion-item">
                                        <a class="accordion-title" href="javascript:void(0)">
                                            <i class='bx bx-chevron-down'></i>
                                            What kind of customer service do you offer?
                                        </a>
        
                                        <div class="accordion-content">
                                            <p>Our ecommerce consultants are here to answer your questions. In addition to FREE phone support, you can contact our consultants via email or live chat.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End FAQ Area -->

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