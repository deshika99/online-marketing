@extends('layouts.app')

@section('content')

<style>
 .card-title {
    text-align: center; 
    color:white;
 }
    .shopping-titles .card{
    border-radius: 15px; 
    overflow: hidden; 
    width:90%;

}
</style>



@include('includes.slider')



<div class="container shopping-titles mt-5 mb-5">
    <div class="row mt-5 row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
        <div class="col">
            <div class="card text-center">
                <a href="{{ route('dress') }}">
                <div class="card-body">
                    <h5 class="card-title">Dress</h5>
                </div></a>
            </div>
        </div>
        <div class="col">
            <div class="card text-center">
            <a href="{{ route('toys') }}">
                <div class="card-body">
                    <h5 class="card-title">Toys</h5>
                </div></a>
            </div>
        </div>
        <div class="col">
            <div class="card text-center">
            <a href="{{ route('cosmetics') }}">
                <div class="card-body">
                    <h5 class="card-title">Cosmetics</h5>
                </div></a>
            </div>
        </div>
        <div class="col">
            <div class="card text-center">
            <a href="{{ route('gifts') }}">
                <div class="card-body">
                    <h5 class="card-title">Gift Items</h5>
                </div></a>
            </div>
        </div>
        <div class="col">
            <div class="card text-center">
            <a href="{{ route('phone_Accessories') }}">
                <div class="card-body">
                    <h5 class="card-title">Phone Accessories</h5>
                </div></a>
            </div>
        </div>
        <div class="col">
            <div class="card text-center">
            <a href="{{ route('school_equipments') }}">
                <div class="card-body">
                    <h5 class="card-title">School Equipment</h5>
                </div></a>
            </div>
        </div>
        <div class="col">
            <div class="card text-center">
            <a href="{{ route('baby_things') }}">
                <div class="card-body">
                    <h5 class="card-title">Baby Things</h5>
                </div></a>
            </div>
        </div>
        <div class="col">
            <div class="card text-center">
            <a href="{{ route('house_hold_goods') }}">
                <div class="card-body">
                    <h5 class="card-title">House hold Goods</h5>
                </div></a>
            </div>
        </div>
        <div class="col">
            <div class="card text-center">
            <a href="{{ route('food') }}"">
                <div class="card-body">
                    <h5 class="card-title">Food</h5>
                </div></a>
            </div>
        </div>
        <div class="col">
            <div class="card text-center">
            <a href="">
                <div class="card-body">
                    <h5 class="card-title">Hobby & Sports</h5>
                </div></a>
            </div>
        </div>
        <div class="col">
            <div class="card text-center">
            <a href="">
                <div class="card-body">
                    <h5 class="card-title">Jewellary</h5>
                </div></a>
            </div>
        </div>
        <div class="col">
            <div class="card text-center">
            <a href="">
                <div class="card-body">
                    <h5 class="card-title">Fashion</h5>
                </div></a>
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
                <a href="{{ route('single_product_page') }}">
                    <img src="/assets/images/item1.png" alt="Product 1">
                    <div class="wishlist"><i class="fa fa-heart"></i></div>
                    <h5>Daraz Like New Smart Watches - SAMSUNG SAMSUNG SAMSUNGSAMSUNG</h5>
                    <div class="price">Rs.35,699</div>
                    <div class="discount">Extra 2% off with coins</div>
                </a>
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
