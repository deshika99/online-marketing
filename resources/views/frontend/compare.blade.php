@extends ('frontend.master')

@section('content')

       
       <!-- Start Page Title -->
        <div class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h2>Compare Products</h2>
                    <ul>
                        <li><a href="/home">Home</a></li>
                        <li>Compare</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Start Compare Area -->
        <section class="compare-area ptb-100">
            <div class="container">
                <div class="products-compare-table table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>Products</td>
                                <td>
                                    <div class="remove-btn">
                                        <a href="#" class="remove"><i class='bx bx-trash'></i></a>
                                    </div>

                                    <div class="single-products-box">
                                        <div class="products-image">
                                            <a href="/product-description">
                                                <img src="frontend/assets/img/products/img1.jpg" class="main-image" alt="image">
                                                <img src="frontend/assets/img/products/img-hover1.jpg" class="hover-image" alt="image">
                                            </a>
                                        </div>
            
                                        <div class="products-content">
                                            <h3><a href="/product-description">Long Sleeve Leopard T-Shirt</a></h3>
                                            <div class="price">
                                                <span class="old-price">RS 2500</span>
                                                <span class="new-price">RS 1500</span>
                                            </div>
                                            <div class="star-rating">
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                            </div>
                                            <a href="/cart" class="add-to-cart">Add to Cart</a>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="remove-btn">
                                        <a href="#" class="remove"><i class='bx bx-trash'></i></a>
                                    </div>

                                    <div class="single-products-box">
                                        <div class="products-image">
                                            <a href="/product-description">
                                                <img src="frontend/assets/img/products/img2.jpg" class="main-image" alt="image">
                                                <img src="frontend/assets/img/products/img-hover2.jpg" class="hover-image" alt="image">
                                            </a>
                                        </div>
            
                                        <div class="products-content">
                                            <h3><a href="/product-description">Causal V-Neck Soft Raglan</a></h3>
                                            <div class="price">
                                                <span class="old-price">RS 1500</span>
                                                <span class="new-price">RS 1300</span>
                                            </div>
                                            <div class="star-rating">
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                            </div>
                                            <a href="/cart" class="add-to-cart">Add to Cart</a>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="remove-btn">
                                        <a href="#" class="remove"><i class='bx bx-trash'></i></a>
                                    </div>

                                    <div class="single-products-box">
                                        <div class="products-image">
                                            <a href="/product-description">
                                                <img src="frontend/assets/img/products/img3.jpg" class="main-image" alt="image">
                                                <img src="frontend/assets/img/products/img-hover3.jpg" class="hover-image" alt="image">
                                            </a>
                                        </div>
            
                                        <div class="products-content">
                                            <h3><a href="/product-description">Hanes Top Men's Pullover</a></h3>
                                            <div class="price">
                                                <span class="old-price">RS 1500</span>
                                                <span class="new-price">RS 1300</span>
                                            </div>
                                            <div class="star-rating">
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                                <i class='bx bxs-star'></i>
                                            </div>
                                            <a href="/cart" class="add-to-cart">Add to Cart</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>Collection</td>
                                <td>Shirt, New Products, T-Shirt</td>
                                <td>Shirt, New Products, T-Shirt</td>
                                <td>Shirt, New Products, T-Shirt</td>
                            </tr>

                            <tr>
                                <td>Availability</td>
                                <td>In Stock</td>
                                <td>In Stock</td>
                                <td>In Stock</td>
                            </tr>

                            <tr>
                                <td>Material</td>
                                <td>100% Polyester</td>
                                <td>100% Polyester</td>
                                <td>100% Polyester</td>
                            </tr>

                            <tr>
                                <td>Vendor</td>
                                <td>Lacoste</td>
                                <td>Lacoste</td>
                                <td>Lacoste</td>
                            </tr>

                            <tr>
                                <td>SKU</td>
                                <td>00105сd-1</p></td>
                                <td>00105сd-1</td>
                                <td>00105сd-1</td>
                            </tr>

                            <tr>
                                <td>Color</td>
                                <td>White</td>
                                <td>Black</td>
                                <td>Blue</td>
                            </tr>

                            <tr>
                                <td>Size</td>
                                <td>20</td>
                                <td>22</td>
                                <td>XXL</td>
                            </tr>

                            <tr>
                                <td>Barcode</td>
                                <td>1234567890</td>
                                <td>1234567890</td>
                                <td>1234567890</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- End Compare Area -->

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