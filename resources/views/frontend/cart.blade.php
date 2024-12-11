@extends ('frontend.master')

@section('content')

       
       <!-- Start Page Title -->
        <div class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h2>Cart</h2>
                    <ul>
                        <li><a href="/home">Home</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Start Cart Area -->
		<section class="cart-area ptb-100">
            <div class="container">
                <form>
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="#">
                                            <img src="frontend/assets/img/products/img1.jpg" alt="item">
                                        </a>
                                    </td>

                                    <td class="product-name">
                                        <a href="#">Long Sleeve Leopard T-Shirt</a>
                                        <ul>
                                            <li>Color: <span>Light Blue</span></li>
                                            <li>Size: <span>XL</span></li>
                                            <li>Material: <span>Cotton</span></li>
                                            <li>Description: <span>It is new meterial</span></li>
                                        </ul>
                                    </td>

                                    <td class="product-price">
                                        <span class="unit-amount">RS 1500</span>
                                    </td>

                                    <td class="product-quantity">
                                        <div class="input-counter">
                                            <span class="minus-btn"><i class='bx bx-minus'></i></span>
                                            <input type="text" min="1" value="1">
                                            <span class="plus-btn"><i class='bx bx-plus'></i></span>
                                        </div>
                                    </td>

                                    <td class="product-subtotal">
                                        <span class="subtotal-amount">RS 1500</span>

                                        <a href="#" class="remove"><i class='bx bx-trash'></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="#">
                                            <img src="frontend/assets/img/products/img2.jpg" alt="item">
                                        </a>
                                    </td>

                                    <td class="product-name">
                                        <a href="#">Causal V-Neck Soft Raglan</a>
                                        <ul>
                                            <li>Color: <span>Light Blue</span></li>
                                            <li>Size: <span>XL</span></li>
                                            <li>Material: <span>Cotton</span></li>
                                            <li>Description: <span>It is new meterial</span></li>
                                        </ul>
                                    </td>

                                    <td class="product-price">
                                        <span class="unit-amount">RS 1300</span>
                                    </td>

                                    <td class="product-quantity">
                                        <div class="input-counter">
                                            <span class="minus-btn"><i class='bx bx-minus'></i></span>
                                            <input type="text" min="1" value="1">
                                            <span class="plus-btn"><i class='bx bx-plus'></i></span>
                                        </div>
                                    </td>

                                    <td class="product-subtotal">
                                        <span class="subtotal-amount">RS 1300</span>

                                        <a href="#" class="remove"><i class='bx bx-trash'></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="#">
                                            <img src="frontend/assets/img/products/img3.jpg" alt="item">
                                        </a>
                                    </td>

                                    <td class="product-name">
                                        <a href="#">Hanes Men's Pullover</a>
                                        <ul>
                                            <li>Color: <span>Light Blue</span></li>
                                            <li>Size: <span>XL</span></li>
                                            <li>Material: <span>Cotton</span></li>
                                            <li>Description: <span>It is new meterial</span></li>
                                        </ul>
                                    </td>

                                    <td class="product-price">
                                        <span class="unit-amount">RS 1300</span>
                                    </td>

                                    <td class="product-quantity">
                                        <div class="input-counter">
                                            <span class="minus-btn"><i class='bx bx-minus'></i></span>
                                            <input type="text" min="1" value="1">
                                            <span class="plus-btn"><i class='bx bx-plus'></i></span>
                                        </div>
                                    </td>

                                    <td class="product-subtotal">
                                        <span class="subtotal-amount">RS 1300</span>

                                        <a href="#" class="remove"><i class='bx bx-trash'></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="#">
                                            <img src="frontend/assets/img/products/img4.jpg" alt="item">
                                        </a>
                                    </td>

                                    <td class="product-name">
                                        <a href="#">Gildan Men's Crew T-Shirt</a>
                                        <ul>
                                            <li>Color: <span>Light Blue</span></li>
                                            <li>Size: <span>XL</span></li>
                                            <li>Material: <span>Cotton</span></li>
                                            <li>Description: <span>It is new meterial</span></li>
                                        </ul>
                                    </td>

                                    <td class="product-price">
                                        <span class="unit-amount">RS 1000</span>
                                    </td>

                                    <td class="product-quantity">
                                        <div class="input-counter">
                                            <span class="minus-btn"><i class='bx bx-minus'></i></span>
                                            <input type="text" min="1" value="1">
                                            <span class="plus-btn"><i class='bx bx-plus'></i></span>
                                        </div>
                                    </td>

                                    <td class="product-subtotal">
                                        <span class="subtotal-amount">RS 1000</span>

                                        <a href="#" class="remove"><i class='bx bx-trash'></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="cart-buttons">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-7 col-sm-7 col-md-7">
                                <a href="#" class="optional-btn">Continue Shopping</a>
                            </div>

                            <div class="col-lg-5 col-sm-5 col-md-5 text-end">
                                <a href="#" class="default-btn">Update Cart</a>
                            </div>
                        </div>
                    </div>

                    <div class="cart-totals">
                        <h3>Cart Totals</h3>

                        <ul>
                            <li>Subtotal <span>RS 5100</span></li>
                            <li>Shipping <span>RS 300</span></li>
                            <li>Total <span>RS 5400</span></li>
                        </ul>
                        
                        <a href="/checkout" class="default-btn">Proceed to Checkout</a>
                    </div>
                </form>
            </div>
        </section>
        <!-- End Cart Area -->

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
           