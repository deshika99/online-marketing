@extends('layouts.app')

@section('content')


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
<style>
    .fit {
        max-width: 100%;
        max-height: 100vh;
        margin: auto;
    }
    .product-price span {
        display: inline-block;
        margin-right: 10px;
    }
</style>

<div class="container mt-4 mb-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item" aria-current="page" id="breadcrumb-product">Product</li>
            <li class="breadcrumb-item active " aria-current="page" id="breadcrumb-description">Description</li>
            <li class="breadcrumb-item active d-none" aria-current="page" id="breadcrumb-specification">Specification</li>
            <li class="breadcrumb-item active d-none" aria-current="page" id="breadcrumb-review">Reviews</li>
            <li class="breadcrumb-item active d-none" aria-current="page" id="breadcrumb-QA">Q & A</li>
        </ol>
    </nav>


    <section class="py-5">
        <div class="container">
            <div class="row gx-5">
            <aside class="col-lg-5">
                <div class="rounded-4 mb-3 d-flex justify-content-center">
                    <a class="rounded-4 glightbox" data-type="image" href="{{ $image }}">
                        <img id="product-image" style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="{{ $image }}" />
                    </a>
                </div>
                <div class="d-flex justify-content-center mb-3">
                    <a class="glightbox mx-1 rounded-2" style="border: none;" data-type="image" href="/assets/images/item1.png">
                        <img width="60" height="60" class="rounded-2" src="" />
                    </a>
                    <a class="glightbox mx-1 rounded-2" style="border: none;" data-type="image" href="/assets/images/item5.png">
                        <img width="60" height="60" class="rounded-2" src="" />
                    </a>
                    <a class="glightbox mx-1 rounded-2" style="border: none;" data-type="image" href="/assets/images/item7.png">
                        <img width="60" height="60" class="rounded-2" src="" />
                    </a>
                    <a class="glightbox mx-1 rounded-2" style="border: none;" data-type="image" href="/assets/images/item6.png">
                        <img width="60" height="60" class="rounded-2" src="" />
                    </a>
                </div>
            </aside>

                <main class="col-lg-7">
                    <div class="ps-lg-3">
                        <h4 class="title text-dark">
                            {{ $title }}
                        </h4>
                        <div class="d-flex flex-row my-3">
                            <div class="text-warning mb-1 me-2">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="ms-1">4.5</span>
                            </div>
                            <span class="text-primary">18 Ratings | </span>
                            <span class="text-primary">&nbsp; 25 Questions Answered</span>
                        </div>
                        <div style="margin-top: -15px;">
                            <span class="text-muted">Brand: </span>
                            <span class="text-primary"> No Brand | More Wearable technology from No Brand</span>
                        </div>

                        <hr />

                        <span class="">Availability :</span>
                        <span class="ms-1" style="color:#4caf50;">In stock</span>
                        <span class="ms-5">Color:</span>
                        <div class="d-inline-block ms-2">
                            <span class="color-label" style="background-color: #f55b29;"></span>
                            <span class="color-label" style="background-color: black;"></span>
                            <span class="color-label" style="background-color: #ffeb3b;"></span>
                            <span class="color-label" style="background-color: blue;"></span>
                        </div>
                        <div class="product-price mb-3 mt-3">
                            <span class="h4" style="color:#f55b29;">Rs. {{ $price }}</span>
                        </div>

                        <div class="d-flex">
                        <a href="#" class="btn btn-custom-buy shadow-0 me-2" onclick="buyNow()">Buy now</a>
                      
                            <a href="#" class="btn btn-custom-cart shadow-0">
                                <i class="me-1 fa fa-shopping-basket"></i>Add to cart
                            </a>
                        </div>
                    </div>
                </main>

            </div>
        </div>
    </section>

    <section class="bg-light border-top py-4">
        <div class="container">
            <div class="row gx-4">
                <div class="col-lg-12 mb-4">
                    <div class="border rounded-2 px-3 py-2 bg-white">
                        <!-- Pills navs -->
                        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                            <li class="nav-item d-flex" role="presentation">
                                <a class="nav-link d-flex align-items-center justify-content-center w-100 active" id="ex1-tab-description" data-bs-toggle="pill" href="#ex1-pills-description" role="tab" aria-controls="ex1-pills-1" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item d-flex" role="presentation">
                                <a class="nav-link d-flex align-items-center justify-content-center w-100" id="ex1-tab-specification" data-bs-toggle="pill" href="#ex1-pills-specification" role="tab" aria-controls="ex1-pills-2" aria-selected="false">Specification</a>
                            </li>
                            <li class="nav-item d-flex" role="presentation">
                                <a class="nav-link d-flex align-items-center justify-content-center w-100" id="ex1-tab-review" data-bs-toggle="pill" href="#ex1-pills-review" role="tab" aria-controls="ex1-pills-3" aria-selected="false">Reviews</a>
                            </li>
                            <li class="nav-item d-flex" role="presentation">
                                <a class="nav-link d-flex align-items-center justify-content-center w-100" id="ex1-tab-QA" data-bs-toggle="pill" href="#ex1-pills-QA" role="tab" aria-controls="ex1-pills-4" aria-selected="false"> Q & A</a>
                            </li>
                        </ul>
                        <!-- Pills navs -->

                        <!-- Pills content -->
                        <div class="tab-content" id="ex1-content">
                            <div class="tab-pane fade p-4" id="ex1-pills-specification" role="tabpanel" aria-labelledby="ex1-tab-specification">
                                <p>
                                    With supporting text below as a natural lead-in to additional content. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                </p>
                                <div class="row mb-2">
                                    <div class="col-12 col-md-6">
                                        <ul class="list-unstyled mb-0">
                                            <li><i class="fas fa-check text-success me-2"></i>Some great feature name here</li>
                                            <li><i class="fas fa-check text-success me-2"></i>Lorem ipsum dolor sit amet, consectetur</li>
                                            <li><i class="fas fa-check text-success me-2"></i>Duis aute irure dolor in reprehenderit</li>
                                            <li><i class="fas fa-check text-success me-2"></i>Optical heart sensor</li>
                                        </ul>
                                    </div>
                                    <div class="col-12 col-md-6 mb-0">
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-check text-success me-2"></i>Easy fast and very good</li>
                                            <li><i class="fas fa-check text-success me-2"></i>Some great feature name here</li>
                                            <li><i class="fas fa-check text-success me-2"></i>Modern style and design</li>
                                        </ul>
                                    </div>
                                </div>
                                <table class="table border mt-3 mb-2">
                                    <tr>
                                        <th class="py-1">OSTizen:</th>
                                        <td class="py-2">4.0</td>
                                    </tr>
                                    <tr>
                                        <th class="py-2">Wireless communication technologies:</th>
                                        <td class="py-2">Bluetooth</td>
                                    </tr>
                                    <tr>
                                        <th class="py-2">Connectivity technologies:</th>
                                        <td class="py-2">Bluetooth</td>
                                    </tr>
                                    <tr>
                                        <th class="py-2">Special features</th>
                                        <td class="py-2">Time Display, GPS, Camera</td>
                                    </tr>
                                    <tr>
                                        <th class="py-2">Human Interface</th>
                                        <td class="py-2">InputTouchscreen</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="tab-pane fade mb-2 show active p-4" id="ex1-pills-description" role="tabpanel" aria-labelledby="ex1-tab-description">
                                <h5>Product Full Description</h5>
                                Live a stronger, smarter life with Galaxy Watch at your wrist. Rest well, stay active and keep stress at bay with built in health tracking. <br>Go for days without charging your watch.<br>
                                The Bluetooth connection keeps everything at your wrist.<br>
                                Compatible with select Bluetooth capable smartphones.<br>
                                Galaxy Watch supported features may vary by carrier and compatible device.
                            </div>
                            <div class="tab-pane fade mb-2" id="ex1-pills-review" role="tabpanel" aria-labelledby="ex1-tab-review">
                                Another tab content or sample information now <br />
                                Dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </div>
                            <div class="tab-pane fade mb-2" id="ex1-pills-QA" role="tabpanel" aria-labelledby="ex1-tab-QA">
                                Some other tab content or sample information now <br />
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </div>
                        </div>
                        <!-- Pills content -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!--related products-->
<div class="container mt-4 mb-4 related-products">
    <h5 class="title1">Related Products</h5>
    <div class="row mb-5">
        <div class="col-md-3">
            <div class="related-product-item">
                <img src="/assets/images/item1.png" alt="Product 1">
                <div class="wishlist"><i class="fa fa-heart"></i></div>
                <h5>Daraz Like New Smart Watches - SAMSUNG SAMSUNG SAMSUNGSAMSUNG</h5>
                <div class="price">Rs.35,699</div>
                <div class="discount">Extra 2% off with coins</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="related-product-item">
                <img src="/assets/images/item2.png" alt="Product 2">
                <div class="wishlist"><i class="fa fa-heart"></i></div>
                <h5>Daraz Like New Smart Watches - SAMSUNG...</h5>
                <div class="price">Rs.32,199</div>
                <div class="discount">Extra 2% off with coins</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="related-product-item">
                <img src="/assets/images/item3.png" alt="Product 3">
                <div class="wishlist"><i class="fa fa-heart"></i></div>
                <h5>Daraz Like New Smart Watches...</h5>
                <div class="price">Rs.15,000</div>
                <div class="discount">Extra 2% off with coins</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="related-product-item">
                <img src="/assets/images/item4.png" alt="Product 4">
                <div class="wishlist"><i class="fa fa-heart"></i></div>
                <h5>Daraz Like New Smart Watches - Apple Watch...</h5>
                <div class="price">Rs.6,000</div>
                <div class="discount">Extra 2% off with coins</div>
            </div>
        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

<script>

const lightbox = GLightbox({
        touchNavigation: true,
        loop: true,
        zoomable: true,
        draggable: true,
        autoplayVideos: true
    });


    document.querySelectorAll('.nav-link').forEach(function(tabLink) {
        tabLink.addEventListener('click', function() {
            setTimeout(function() { 
                var activeTab = document.querySelector('.nav-link.active').getAttribute('id');
                document.getElementById('breadcrumb-description').classList.add('d-none');
                document.getElementById('breadcrumb-specification').classList.add('d-none');
                document.getElementById('breadcrumb-review').classList.add('d-none');
                document.getElementById('breadcrumb-QA').classList.add('d-none');
                
                if (activeTab == 'ex1-tab-description') {
                    document.getElementById('breadcrumb-description').classList.remove('d-none');
                } else if (activeTab == 'ex1-tab-specification') {
                    document.getElementById('breadcrumb-specification').classList.remove('d-none');
                } else if (activeTab == 'ex1-tab-review') {
                    document.getElementById('breadcrumb-review').classList.remove('d-none');
                } else if (activeTab == 'ex1-tab-QA') {
                    document.getElementById('breadcrumb-QA').classList.remove('d-none');
                }
            }, 100);
        });
    });
</script>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Fetch initial cart count
        $.get("{{ route('cart.count') }}", function(data) {
            $('#cart-count').text(data.cart_count);
        });

        $('.btn-custom-cart').on('click', function(e) {
            e.preventDefault();

            const title = $('.title').text().trim();
            const price = $('.product-price .h4').text().trim().replace('Rs. ', '');
            const image = $('#product-image').attr('src'); // Ensure you have the image source

            $.ajax({
                url: "{{ route('cart.add') }}",
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    title: title,
                    price: price,
                    image: image
                },
                success: function(response) {
                    // Update cart count
                    $.get("{{ route('cart.count') }}", function(data) {
                        $('#cart-count').text(data.cart_count);
                    });
                    alert('Item added to cart!');
                },
                error: function(xhr) {
                    alert('Something went wrong. Please try again.');
                }
            });
        });


    // Buy Now button
    window.buyNow = function() {
            const title = $('.title').text().trim();
            const price = $('.product-price .h4').text().trim().replace('Rs. ', '');
            const image = $('#product-image').attr('src'); // Ensure you have the image source

            $.ajax({
                url: "{{ route('cart.add') }}",
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    title: title,
                    price: price,
                    image: image
                },
                success: function(response) {
                    // Update cart count
                    $.get("{{ route('cart.count') }}", function(data) {
                        $('#cart-count').text(data.cart_count);
                    });
                    window.location.href = "{{ route('shopping_cart') }}"; // Redirect to cart page
                },
                error: function(xhr) {
                    alert('Something went wrong. Please try again.');
                }
            });
        }
    });
</script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection
