@extends('layouts.admin_main.master')

@section('content')

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
    .bg-gradient-warning {
        background: linear-gradient(45deg, #FF9800, #FFC107);
    }
    .bg-gradient-success {
        background: linear-gradient(45deg, #4CAF50, #81C784);
    }
    .bg-gradient-info {
        background: linear-gradient(45deg, #00ACC1, #4DD0E1);
    }
    .bg-gradient-danger {
        background: linear-gradient(45deg, #F44336, #E57373);
    }

    .text-end {
        font-weight: bold;
    }

    .chart-container {
        padding: 20px;
        background: #fff;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }

    .chart-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 20px;
    }
</style>

<main style="margin-top: 50px">
    <div class="container px-5 py-4"> 
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row align-items-center mb-3 mt-2">
            <div class="col">
                <h2 class="h5 page-title">Welcome!</h2>
            </div>
        </div>

        <section>
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12 mb-4" >
                    <div class="card bg-gradient-warning text-white" style="border-radius: 0px;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center px-md-1">
                                <div class="align-self-center">
                                    <i class="fas fa-shopping-cart fa-3x"></i>
                                </div>
                                <div class="text-end">
                                    <h3 class="mb-0">278</h3>
                                    <p class="mb-0 text-uppercase">Orders</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card bg-gradient-success text-white" style="border-radius: 0px;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center px-md-1">
                                <div class="align-self-center">
                                    <i class="fa-solid fa-dollar-sign fa-3x"></i>
                                </div>
                                <div class="text-end">
                                    <h3 class="mb-0">156</h3>
                                    <p class="mb-0 text-uppercase">Today Revenue</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card bg-gradient-info text-white" style="border-radius: 0px;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center px-md-1">
                                <div class="align-self-center">
                                    <i class="fas fa-users fa-3x"></i>
                                </div>
                                <div class="text-end">
                                    <h3 class="mb-0">64</h3>
                                    <p class="mb-0 text-uppercase">Customers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card bg-gradient-danger text-white" style="border-radius: 0px;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center px-md-1">
                                <div class="align-self-center">
                                    <i class="fas fa-box fa-3x"></i>
                                </div>
                                <div class="text-end">
                                    <h3 class="mb-0">423</h3>
                                    <p class="mb-0 text-uppercase">Products</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <!-- Line Chart Container -->
                <div class="col-md-7">
                    <div class="chart-container">
                        <div class="chart-title">Product Sales</div>
                        <div id="productSalesChart"></div>
                    </div>
                </div>

                <!-- Pie Chart Container -->
                <div class="col-md-5">
                    <div class="chart-container">
                        <div class="chart-title">Top 5 Products</div>
                        <div id="topProductsChart"></div>
                    </div>
                </div>

            <!-- Line Chart Container -->
            <div class="row items-align-baseline">
                <div class="col-md-12 mb-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="total-revenue">
                                <span id="totalThisWeek">This Week Total Revenue: </span><br>
                                <span id="totalLastWeek">Last Week Total Revenue: </span>
                            </div>
                            <div id="lineChart1"></div>
                        </div>
                    </div> 
                </div>
            </div>
        </section>
    </div>
</main>



@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    // Product Sales Line Chart
        document.addEventListener('DOMContentLoaded', function () {
            var options = {
                series: [{
                    name: 'Sales',
                    data: [12, 10, 3, 4, 2, 3, 8]
                }],
                chart: {
                    type: 'line',
                    height: 240,
                    toolbar: {
                        show: false 
                    }
                },
                colors: ['#4CAF50'],
                stroke: {
                    curve: 'smooth',
                    width: 2
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        style: {
                            colors: '#6c757d'
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: '#6c757d'
                        }
                    }
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return val;
                        }
                    }
                },
                grid: {
                    borderColor: '#e0e0e0',
                    strokeDashArray: 4
                }
            };

            var chart = new ApexCharts(document.querySelector("#productSalesChart"), options);
            chart.render();
        });



// Top 5 Products Donut Chart
document.addEventListener('DOMContentLoaded', function () {
    var options = {
        series: [10, 20, 30, 25, 15],
        chart: {
            type: 'donut',  
            height: 250,  
        },
        labels: ['Product A', 'Product B', 'Product C', 'Product D', 'Product E'],  
        colors: ['#FF6384', '#36A2EB', '#FFCE56', '#4ec26b', '#d9d748'],
        legend: {
            position: 'right',  
            offsetY: 0,
            labels: {
                colors: ['black']  
            }
        },
        plotOptions: {
            pie: {
                donut: {
                    size: '65%'  
                }
            }
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: '100%'
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#topProductsChart"), options);
    chart.render();
});


   


 // Line Chart 
document.addEventListener('DOMContentLoaded', function () {

    const categories = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
    const currentWeekSeries = [500, 600, 700, 900, 800, 500, 1000];
    const lastWeekSeries = [400, 600, 600, 800, 900, 600, 1000];
    const totalCurrentWeekRevenue = currentWeekSeries.reduce((a, b) => a + b, 0);
    const totalLastWeekRevenue = lastWeekSeries.reduce((a, b) => a + b, 0);

    // Update total revenue display
    document.getElementById('totalThisWeek').innerText = `This Week Total Revenue: Rs ${totalCurrentWeekRevenue.toFixed(2)}`;
    document.getElementById('totalLastWeek').innerText = `Last Week Total Revenue: Rs ${totalLastWeekRevenue.toFixed(2)}`;

    var options = {
        series: [{
            name: 'This Week',
            data: currentWeekSeries
        }, {
            name: 'Last Week',
            data: lastWeekSeries
        }],
        chart: {
            type: 'area',
            height: 350,
            toolbar: {
                show: false 
            }
        },
        stroke: {
            curve: 'smooth',
            width: 2
        },
        markers: {
            size: 0
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            categories: categories,
            axisBorder: {
                show: false
            },
            axisTicks: {
                show: false
            },
            labels: {
                rotate: -45
            }
        },
        yaxis: {
            labels: {
                formatter: function (value) {
                    return " " + value;
                }
            }
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function (value) {
                    return "Rs " + value;
                }
            }
        },
        colors: ['#602082', '#f5991c']
    };

    var chart = new ApexCharts(document.querySelector("#lineChart1"), options);
    chart.render();
});
</script>



@endsection
