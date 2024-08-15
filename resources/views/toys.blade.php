@extends('layouts.app')

@section('content')

<style>
       
</style>



<!--toys-->
<div class="container mt-4 mb-5">
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Toys</li>
        </ol>
    </nav>

        <div class="products">
            <div class="row mt-3">
                <div class="col-md-3">
                    <div class="products-item">
                        <a href="{{ route('single_product_page', [
                        'title' => 'Electronic Toys Srilanka - Shop for best Electronic Toys online',
                        'image' => '/assets/images/toys1.jpg',
                        'price' => 350
                    ]) }}">
                            <img src="/assets/images/toys1.jpg" alt="Product 1">
                            <h6>Electronic Toys Srilanka - Shop for best Electronic Toys online</h6>
                            <div class="price">Rs.350</div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="products-item">
                        <img src="/assets/images/toys2.jpg" alt="Product 1">
                        <h6>Electronic Toys Srilanka - Shop for best Electronic Toys online</h6>
                        <div class="price">Rs.350</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="products-item">
                        <img src="/assets/images/toys3.png" alt="Product 1">
                        <h6>Electronic Toys Srilanka - Shop for best Electronic Toys online</h6>
                        <div class="price">Rs.350</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="products-item">
                        <img src="/assets/images/toys4.jpg" alt="Product 1">
                        <h6>Electronic Toys Srilanka - Shop for best Electronic Toys online</h6>
                        <div class="price">Rs.350</div>
                    </div>
                </div>
            </div>
        </div>



    <div class="row-divider"></div>
   

    <div class="products">
            <div class="row mt-3">
                <div class="col-md-3">
                    <div class="products-item">
                        <img src="/assets/images/toys1.jpg" alt="Product 1">
                        <h6>Electronic Toys Srilanka - Shop for best Electronic Toys online</h6>
                        <div class="price">Rs.350</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="products-item">
                        <img src="/assets/images/toys2.jpg" alt="Product 1">
                        <h6>Electronic Toys Srilanka - Shop for best Electronic Toys online</h6>
                        <div class="price">Rs.350</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="products-item">
                        <img src="/assets/images/toys3.png" alt="Product 1">
                        <h6>Electronic Toys Srilanka - Shop for best Electronic Toys online</h6>
                        <div class="price">Rs.350</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="products-item">
                        <img src="/assets/images/toys4.jpg" alt="Product 1">
                        <h6>Electronic Toys Srilanka - Shop for best Electronic Toys online</h6>
                        <div class="price">Rs.350</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-divider"></div>

        <div class="products">
            <div class="row mt-3">
                <div class="col-md-3">
                    <div class="products-item">
                        <img src="/assets/images/toys1.jpg" alt="Product 1">
                        <h6>Electronic Toys Srilanka - Shop for best Electronic Toys online</h6>
                        <div class="price">Rs.350</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="products-item">
                        <img src="/assets/images/toys2.jpg" alt="Product 1">
                        <h6>Electronic Toys Srilanka - Shop for best Electronic Toys online</h6>
                        <div class="price">Rs.350</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="products-item">
                        <img src="/assets/images/toys3.png" alt="Product 1">
                        <h6>Electronic Toys Srilanka - Shop for best Electronic Toys online</h6>
                        <div class="price">Rs.350</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="products-item">
                        <img src="/assets/images/toys4.jpg" alt="Product 1">
                        <h6>Electronic Toys Srilanka - Shop for best Electronic Toys online</h6>
                        <div class="price">Rs.350</div>
                    </div>
                </div>
            </div>
        </div>
    
</div>



@endsection
