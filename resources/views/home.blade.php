@extends('layouts.app')

@section('content')

<style>
 .card-title {
    text-align: center; 
    color:white;
    font-size: 17px;
 }
    .shopping-titles .card{
    border-radius: 15px; 
    overflow: hidden; 
    width:90%;

}
.card-title i {
    margin-right: 7px; 
    font-size: 1.2em;  
}

.rounded-circle{
    width:110px;
    background-color: #f5f5f5;
}

.category-circle a{
    color: black;
    font-weight: 500;
}
</style>



@include('includes.slider')



<div class="container shopping-titles mt-4 mb-3" style="width: 80%;">
    <div class="row mt-5 row-cols-2 row-cols-md-3 row-cols-lg-6 g-2">
        <div class="col text-center category-circle">
            <a href="{{ route('dress') }}">
                <img src="/assets/images/category/dress.png" alt="Category 1" class="rounded-circle">
                <p class="mt-2">Dress</p>
            </a>
        </div>
        <div class="col text-center category-circle">
            <a href="{{ route('toys') }}">
                <img src="/assets/images/category/toy.png" alt="Category 2" class="rounded-circle">
                <p class="mt-2">Toys</p>
            </a>
        </div>
        <div class="col text-center category-circle">
            <a href="{{ route('cosmetics') }}">
                <img src="/assets/images/category/cosmetics.png" alt="Category 3" class="rounded-circle">
                <p class="mt-2">Cosmetics</p>
            </a>
        </div>
        <div class="col text-center category-circle">
            <a href="{{ route('gifts') }}">
                <img src="/assets/images/category/gift.png" alt="Category 4" class="rounded-circle">
                <p class="mt-2">Gift Items</p>
            </a>
        </div>
        <div class="col text-center category-circle">
            <a href="{{ route('phone_Accessories') }}">
                <img src="/assets/images/category/phone.png" alt="Category 5" class="rounded-circle">
                <p class="mt-2">Phone Accessories</p>
            </a>
        </div>
        <div class="col text-center category-circle">
            <a href="{{ route('school_equipments') }}">
                <img src="/assets/images/category/school.png" alt="Category 6" class="rounded-circle">
                <p class="mt-2">School Equipment</p>
            </a>
        </div>
        <div class="col text-center category-circle">
            <a href="{{ route('baby_things') }}">
                <img src="/assets/images/category/baby.png" alt="Category 7" class="rounded-circle">
                <p class="mt-2">Baby Things</p>
            </a>
        </div>
        <div class="col text-center category-circle">
            <a href="{{ route('house_hold_goods') }}">
                <img src="/assets/images/category/house.png" alt="Category 8" class="rounded-circle">
                <p class="mt-2">Household Goods</p>
            </a>
        </div>
        <div class="col text-center category-circle">
            <a href="{{ route('food') }}">
                <img src="/assets/images/category/food.png" alt="Category 9" class="rounded-circle">
                <p class="mt-2">Food</p>
            </a>
        </div>
        <div class="col text-center category-circle">
            <a href="{{ route('dress') }}">
                <img src="/assets/images/category/sports.png" alt="Category 10" class="rounded-circle">
                <p class="mt-2">Hobby & Sports</p>
            </a>
        </div>
        <div class="col text-center category-circle">
            <a href="{{ route('dress') }}">
                <img src="/assets/images/category/jewellary.png" alt="Category 11" class="rounded-circle">
                <p class="mt-2">Jewellary</p>
            </a>
        </div>
        <div class="col text-center category-circle">
            <a href="{{ route('dress') }}">
                <img src="/assets/images/category/fashion.png" alt="Category 12" class="rounded-circle">
                <p class="mt-2">Fashion</p>
            </a>
        </div>
    </div>
</div>



<!--special offers-->
<div class="container mt-5 mb-4 special-offers" style="width:76%;">
    <h3>Special Offers</h3>
    <div class="row  justify-content-between">
        <div class="col-2">
            <div class="special-offer-item mb-2">
                <a href="{{ route('single_product_page', [
                            'title' => 'Daraz Like New Smart Watches - SAMSUNG SAMSUNG SAMSUNGSAMSUNG',
                            'image' => '/assets/images/item1.png',
                            'price' => 35699
                        ]) }}">
                    <img src="/assets/images/item1.png" class="card-img-top"/>
                    <div class="card-body">
                        <div class="wishlist"><i class="fa fa-heart"></i></div>
                        <h5>Daraz Like New Smart Watches - SAMSUNG SAMSUNG SAMSUNGSAMSUNG</h5>
                        <div class="price">Rs.35 699</div>
                        <div class="discount">Extra 2% off with coins</div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-2">
            <div class="special-offer-item mb-2">
                <a href="">
                    <img src="/assets/images/item2.png" class="card-img-top"/>
                    <div class="card-body">
                        <div class="wishlist"><i class="fa fa-heart"></i></div>
                        <h5>Daraz Like New Smart Watches - SAMSUNG SAMSUNG SAMSUNGSAMSUNG</h5>
                        <div class="price">Rs.35 699</div>
                        <div class="discount">Extra 2% off with coins</div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-2">
            <div class="special-offer-item mb-2">
                <a href="">
                    <img src="/assets/images/item3.png" class="card-img-top"/>
                    <div class="card-body">
                        <div class="wishlist"><i class="fa fa-heart"></i></div>
                        <h5>Daraz Like New Smart Watches - SAMSUNG SAMSUNG SAMSUNGSAMSUNG</h5>
                        <div class="price">Rs.35 699</div>
                        <div class="discount">Extra 2% off with coins</div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-2">
            <div class="special-offer-item mb-2">
                <a href="">
                    <img src="/assets/images/item4.png" class="card-img-top"/>
                    <div class="card-body">
                        <div class="wishlist"><i class="fa fa-heart"></i></div>
                        <h5>Daraz Like New Smart Watches - SAMSUNG SAMSUNG SAMSUNGSAMSUNG</h5>
                        <div class="price">Rs.35 699</div>
                        <div class="discount">Extra 2% off with coins</div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-2">
            <div class="special-offer-item mb-2">
                <a href="">
                    <img src="/assets/images/item4.png" class="card-img-top"/>
                    <div class="card-body">
                        <div class="wishlist"><i class="fa fa-heart"></i></div>
                        <h5>Daraz Like New Smart Watches - SAMSUNG SAMSUNG SAMSUNGSAMSUNG</h5>
                        <div class="price">Rs.35 699</div>
                        <div class="discount">Extra 2% off with coins</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>



<!--Flash Sale-->
<div class="container mt-5 flash-sale" style="width:76%; background: linear-gradient(to top, #f0f0f0, #ffffff);">
    <h3><i class="fas fa-bolt" style="color: #FFD43B;"></i> Flash Sale</h3>
    <div class="row">
        <div class="col-md-2 flash-sale-item">
            <img src="/assets/images/sale2.png" alt="Product 1">
            <h6>Brand new Bluetooth Earbuds </h6>
            <div class="price">Rs.1000</div>
        </div>
        <div class="col-md-2 flash-sale-item">
            <img src="/assets/images/schl1.jpg" alt="Product 2">
            <h6>2.4G Wireless Mouse With USB Bluetooth Mouse Silent Computer Mice</h6>
            <div class="price">Rs.950</div>
        </div>
        <div class="col-md-2 flash-sale-item">
            <img src="/assets/images/sale2.png" alt="Product 3">
            <h6>Buy Cow & Gate Step Up (1 - 3 Years) 350G</h6>
            <div class="price">Rs.1840</div>
        </div>
        <div class="col-md-2 flash-sale-item">
            <img src="/assets/images/sale5.jpg" alt="Product 4">
            <h6>Microfiber Car Washing Sponge Towel Cloth Cleaning </h6>
            <div class="price">Rs.230</div>
        </div>
        <div class="col-md-2 flash-sale-item">
            <img src="/assets/images/schl3.jpg" alt="Product 4">
            <h6>Buy Office 365 lifetime 5 Devices Online Activation for windows</h6>
            <div class="price">Rs.530</div>
        </div>
        <div class="col-md-2 flash-sale-item">
            <img src="/assets/images/schl1.jpg" alt="Product 4">
            <h6>Buy Office 365 lifetime 5 Devices Online Activation for windows</h6>
            <div class="price">Rs.530</div>
        </div>
    </div>
</div>


<div class="container mt-2" style="text-align:right;">
    <a href="" class="btn-next">Next</a>
</div>



@endsection
