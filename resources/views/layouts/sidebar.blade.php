@extends('layouts.app')

@section('content')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fafafa;
        }
        .dashboard-container {
            margin-top: 20px;
        }
        .sidebar {
            background-color: white;
            color: black;
            position: sticky;
            top: 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
            border: 1px solid #e0e0e0; 
        }
        .sidebar a {
            color: black;
            border-bottom: 1px solid #e0e0e0; 
            padding: 10px;
            display: block;
        }
        .sidebar a:hover {
            background-color: #e8ecf0;
            color: black;
        }
        .sidebar .nav-item {
            padding: 5px; 
        }
        .sidebar .nav-link.active {
            background-color: #e8ecf0;
        }
        .card-container {
            padding: 20px;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
            border: 1px solid #e0e0e0; 
            height:80vh;
        }
    </style>

<div class="container mt-4 mb-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">My Account</li>
        </ol>
    </nav>

    <div class="row dashboard-container">
        <nav class="col-md-3 col-lg-2 d-md-block sidebar">
            <div class="position-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('edit-profile') }}">Edit Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('order-history') }}">Order History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('myorder-details') }}">Order Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('points') }}">Points</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('addresses') }}">Addresses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('change-password') }}">Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
            <div class="card">
                <div class="card-body card-container">
                    @yield('dashboard-content')
                </div>
            </div>
        </main>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
@endsection
