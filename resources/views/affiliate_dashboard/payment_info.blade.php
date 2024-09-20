@extends('layouts.affiliate_main.master')

@section('content')
<!-- resources/views/payment_info.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Information</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .table thead {
            background-color: #f9f9f9; 
        }

        /* Sidebar Styles */
        .sidebar {
            background-color: #ffffff;
            border-right: 1px solid #ddd;
            padding: 20px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            overflow-y: auto;
            width: 250px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 20px 0;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #333;
            font-size: 16px;
        }

        .sidebar ul li a:hover {
            color: #007bff;
        }

        .sidebar ul ul li a {
            font-size: 14px;
            padding-left: 20px;
        }

        /* Main Content Styles */
        .main-content {
            margin-left: 270px;
            padding: 40px;
        }

        .card {
            max-width: 100%;
            text-align: center;
            padding: 40px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #ffffff;
        }

        .card img {
            width: 150px;
            margin-bottom: 50px;
        }

        .card h3 {
            font-size: 24px;
            color: #333;
            margin-bottom: 15px;
        }

        .card p {
            color: #666;
            margin-bottom: 30px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                height: auto;
                width: 100%;
                border-right: none;
                padding: 20px 10px;
            }

            .main-content {
                margin-left: 0;
                padding: 20px;
            }

            .sidebar ul li a {
                font-size: 14px;
            }
        }

        @media (max-width: 576px) {
            .card {
                padding: 20px;
            }

            .btn-primary {
                padding: 8px 15px;
                font-size: 14px;
            }

            .card h3 {
                font-size: 20px;
            }

            .card p {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <main style="margin-top: 58px">
        <div class="container-fluid pt-4 px-4"> 
            <h3 class="py-3">Payment Information</h3>
            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar">
                        <h4>AliExpress Portals</h4>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Ad Center</a></li>
                            <li><a href="#">Code Center</a></li>
                            <li><a href="#">Incentive Campaign</a></li>
                            <li><a href="#">Reports</a></li>
                            <li><a href="#">Tools</a></li>
                            <li><a href="#">Payment</a>
                                <ul>
                                    <li><a href="#">Withdrawals</a></li>
                                    <li><a href="#">Account Balance</a></li>
                                    <li><a href="#" style="color: #007bff;">Payment Information</a></li>
                                    <li><a href="#">Commission Rules</a></li>
                                    <li><a href="#">Penalty Center</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Account</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-md-9">
                    <div class="card">
                        <h3>Bank Account Not Linked</h3>
                        <p>You have not linked any bank account</p>

                        <!-- Add Bank Account Button -->
                        <div class="form-controls mb-3">
                            <a href="{{ route('bank.acc') }}" class="btn btn-primary">Add a Bank Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
@endsection


   
  