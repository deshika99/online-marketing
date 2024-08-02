@extends('layouts.app')

@section('content')

<style>
        .dresses{
            padding: 20px;
        }
        .dresses h2 {
            text-align: left;
            margin-bottom: 30px;
            font-weight:bold;
        }
        .dresses-item {
            text-align: center;
            border-radius: 10px;
            position: relative;
        }

        .dresses img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
            border: 0 solid #e1e1e1;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .dresses h5 {
            text-align: left;
            margin: 10px 0;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
        .dresses .price {
            text-align: left;
            color: orange;
            font-size: 20px;
        }

        .row-divider {
        height: 1px; 
        background: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0));
        margin: 20px 0; 
        }

        .breadcrumb {
        background: none;
        padding: 0;
        margin-bottom: 20px;
    }
    .breadcrumb-item + .breadcrumb-item::before {
        content: "/";
    }
    .breadcrumb-item {
        font-size: 20px;
    }
    .breadcrumb-item a {
        text-decoration: none;
        color: black; 
    }
    .breadcrumb-item.active {
        color: red; 
    }
</style>



<!--dresses-->
<div class="container mt-4 mb-5">
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dress</li>
        </ol>
    </nav>

        <div class="dresses">
            <div class="row mt-3">
                <div class="col-md-3">
                    <div class="dresses-item">
                        <img src="/assets/images/dress1.png" alt="Product 1">
                        <h5>Party Dress for girl</h5>
                        <div class="price">Rs.3500</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dresses-item">
                        <img src="/assets/images/dress2.png" alt="Product 2">
                        <h5>Party Dress for girl</h5>
                        <div class="price">Rs.4200</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dresses-item">
                        <img src="/assets/images/dress3.png" alt="Product 3">
                        <h5>Party Dress for girl</h5>
                        <div class="price">Rs.5500</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="dresses-item">
                        <img src="/assets/images/dress4.png" alt="Product 4">
                        <h5>Party Dress for girl</h5>
                        <div class="price">Rs.3200</div>
                    </div>
                </div>
            </div>
        </div>



    <div class="row-divider"></div>
   

    <div class="dresses">
        <div class="row mt-5 mb-5">
            <div class="col-md-3">
                <div class="dresses-item">
                    <img src="/assets/images/dress1.png" alt="Product 1">
                    <h5>Party Dress for girl</h5>
                    <div class="price">Rs.3500</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dresses-item">
                    <img src="/assets/images/dress2.png" alt="Product 2">
                    <h5>Party Dress for girl</h5>
                    <div class="price">Rs.4200</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dresses-item">
                    <img src="/assets/images/dress3.png" alt="Product 3">
                    <h5>Party Dress for girl</h5>
                    <div class="price">Rs.5500</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dresses-item">
                    <img src="/assets/images/dress4.png" alt="Product 4">
                    <h5>Party Dress for girl</h5>
                    <div class="price">Rs.3200</div>
                </div>
            </div>
        </div>
    </div>
    
</div>



@endsection
