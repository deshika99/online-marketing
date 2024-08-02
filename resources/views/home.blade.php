@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


<style>
    .card-title {
    text-align: center; 
    color:white;
}
.card-body{
    background-color: #0a6dbf;

}
.card{
    border-radius: 15px; 
    overflow: hidden; 
}

        .special-offers {
            padding: 20px;
        }
        .special-offers h2 {
            text-align: left;
            margin-bottom: 30px;
            font-weight:bold;
        }
        .special-offer-item {
            text-align: center;
            padding: 25px;
            border-radius: 10px;
            position: relative;
        }

        .special-offer-item:hover{
            border: 1px solid #e1e1e1;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        }

        .special-offer-item img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
        .special-offer-item h5 {
            text-align: left;
            margin: 10px 0;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
        .special-offer-item .price {
            text-align: left;
            color: orange;
            font-size: 18px;
            font-weight: bold;
        }
        .special-offer-item .discount {
            text-align: left;
            color: red;
            font-size: 14px;
        }
        .special-offer-item .wishlist {
            position: absolute;
            top: 10px;
            right: 10px;
            color: black;
        }
  
        .special-offer-item .wishlist:hover {
            color: red;
        }




        .flash-sale-item {
        text-align: center;
        padding: 25px;
        border-radius: 10px;
        flex-direction: column;
        justify-content: space-between;
        display: flex; 
        align-items: center; 
        height: auto; 
        box-sizing: border-box; 
    }

    .flash-sale-item:hover {
        border: 1px solid #e1e1e1;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
    }

    .flash-sale-item img {
        width: 100%; 
        height: auto; 
        object-fit: cover; 
        margin-bottom: 10px;
    }

    .flash-sale-item h6 {
        text-align: left; 
        margin: 8px 0;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .flash-sale-item .price {
        text-align: left; 
        color: orange;
        font-size: 18px;
        font-weight: bold;
    }

    .flash-sale .row {
        display: flex;
        justify-content: space-between; 
        flex-wrap: wrap; 
    }



.btn-next {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    color: black;
    font-weight: bold;
    background-color: #b4b8bd; 
    border: none;
    text-align: center;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.btn-next:hover {
    background-color: #939699; 
}

</style>

<!--carousel-->
<header class="hero-header">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/assets/images/slider/slider.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h2 class="animated fadeInUp" style="animation-delay: 0s;">Elevate Your <br>Lifestyle</h2>
                <h3 class="animated fadeInUp" style="animation-delay: 1s;">On home & living, leisure & more</h3>
                <p class="animated fadeInUp" style="animation-delay: 2s;"><a href="#">Add to Cart</a></p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="/assets/images/slider/slider1.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h2 class="animated fadeInUp" style="animation-delay: 0s;">Elevate Your <br>Lifestyle</h2>
                <h3 class="animated fadeInUp" style="animation-delay: 1s;">On home & living, leisure & more</h3>
                <p class="animated fadeInUp" style="animation-delay: 2s;"><a href="#">Add to Cart</a></p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="/assets/images/slider/slider3.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h2 class="animated fadeInUp" style="animation-delay: 0s;">Elevate Your <br>Lifestyle</h2>
                <h3 class="animated fadeInUp" style="animation-delay: 1s;">On home & living, leisure & more</h3>
                <p class="animated fadeInUp" style="animation-delay: 2s;"><a href="#">Add to Cart</a></p>
            </div>
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
</header>

<div class="container mt-5 mb-5">
    <div class="row mt-5 row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
        <div class="col">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Dress</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Toys</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Cosmetics</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Gift Items</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Phone Accessories</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">School Equipment</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Baby Things</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">House hold Goods</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Food</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Hobby & Sports</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Jewellary</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Fashion</h5>
                </div>
            </div>
        </div>
    </div>
</div>


<!--special offers-->
<div class="container mt-4 mb-4 special-offers">
    <h2>Special Offers</h2>
    <div class="row">
        <div class="col-md-3">
            <div class="special-offer-item">
                <img src="/assets/images/item1.png" alt="Product 1">
                <div class="wishlist"><i class="fa fa-heart"></i></div>
                <h5>Daraz Like New Smart Watches - SAMSUNG SAMSUNG SAMSUNGSAMSUNG</h5>
                <div class="price">Rs.35,699</div>
                <div class="discount">Extra 2% off with coins</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="special-offer-item">
                <img src="/assets/images/item2.png" alt="Product 2">
                <div class="wishlist"><i class="fa fa-heart"></i></div>
                <h5>Daraz Like New Smart Watches - SAMSUNG...</h5>
                <div class="price">Rs.32,199</div>
                <div class="discount">Extra 2% off with coins</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="special-offer-item">
                <img src="/assets/images/item3.png" alt="Product 3">
                <div class="wishlist"><i class="fa fa-heart"></i></div>
                <h5>Daraz Like New Smart Watches...</h5>
                <div class="price">Rs.15,000</div>
                <div class="discount">Extra 2% off with coins</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="special-offer-item">
                <img src="/assets/images/item4.png" alt="Product 4">
                <div class="wishlist"><i class="fa fa-heart"></i></div>
                <h5>Daraz Like New Smart Watches - Apple Watch...</h5>
                <div class="price">Rs.6,000</div>
                <div class="discount">Extra 2% off with coins</div>
            </div>
        </div>
    </div>
</div>


<!--Flash Sale-->
<div class="container mt-4 mb-5 flash-sale">
        <h2>Flash Sale</h2>
        <div class="row">
            <div class="col-md-2  flash-sale-item">
                <img src="/assets/images/sale2.png" alt="Product 1">
                <h6>Brand new Bluetooth Earbuds </h6>
                <div class="price">Rs.1000</div>
            </div>
            <div class="col-md-2  flash-sale-item">
                <img src="/assets/images/sale5.jpg" alt="Product 2">
                <h6>2.4G Wireless Mouse With USB Bluetooth Mouse Silent Computer Mice</h6>
                <div class="price">Rs.950</div>
            </div>
            <div class="col-md-2  flash-sale-item">
                <img src="/assets/images/sale3.jpeg" alt="Product 3">
                <h6>Buy Cow & Gate Step Up (1 - 3 Years) 350G</h6>
                <div class="price">Rs.1840</div>
            </div>
            <div class="col-md-2  flash-sale-item">
                <img src="/assets/images/sale1.png" alt="Product 4">
                <h6>Microfiber Car Washing Sponge Towel Cloth Cleaning </h6>
                <div class="price">Rs.230</div>
            </div>
            <div class="col-md-2  flash-sale-item">
                <img src="/assets/images/sale4.jpg" alt="Product 4">
                <h6>Buy Office 365 lifetime 5 Devices Online Activation for windows</h6>
                <div class="price">Rs.530</div>
            </div>
        </div>
    </div>

    <div class="container" style="text-align:right;">
    <a href="" class="btn-next mb-5">Next</a>
    </div>


@endsection
