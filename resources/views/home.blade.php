@extends('layouts.app')

@section('content')
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

</style>

<header class="hero-header">
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="/assets/images/slider/slider3.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h2 class="animated fadeInUp" style="animation-delay: 1s;">Elevate Your <br>Lifestyle</h2>
            <h3 class="animated fadeInUp" style="animation-delay: 2s;">On home & living, leisure & more</h3>
            <p class="animated fadeInUp" style="animation-delay: 3s;"><a href="#">Add to Cart</a></p>
        </div>
    </div>
    <div class="carousel-item">
        <img src="/assets/images/slider/slider4.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h2 class="animated fadeInUp" style="animation-delay: 1s;">Elevate Your <br>Lifestyle</h2>
            <h3 class="animated fadeInUp" style="animation-delay: 2s;">On home & living, leisure & more</h3>
            <p class="animated fadeInUp" style="animation-delay: 3s;"><a href="#">Add to Cart</a></p>
        </div>
    </div>
    <div class="carousel-item">
        <img src="/assets/images/slider/slider3.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h2 class="animated fadeInUp" style="animation-delay: 1s;">Elevate Your <br>Lifestyle</h2>
            <h3 class="animated fadeInUp" style="animation-delay: 2s;">On home & living, leisure & more</h3>
            <p class="animated fadeInUp" style="animation-delay: 3s;"><a href="#">Add to Cart</a></p>
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

@endsection
