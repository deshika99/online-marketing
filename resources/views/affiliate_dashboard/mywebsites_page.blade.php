@extends('layouts.affiliate_main.master')

@section('content')
<style>
   


  
</style>  

<main style="margin-top: 58px">
    <div class="container pt-4 px-4"> 
        <h3 class="py-3">My Websites</h3>

        <div class="card mb-4">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-4 mb-2 d-flex align-items-center">
                        <h5 class="py-3" style="font-weight: bold;">Basic Information</h5>
                    </div>
                    <div class="col-md-8 d-flex justify-content-end">
                        <span class="filter-option me-3 text-primary">Edit</span>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td><strong>Login email</strong><br>mw2000@gmail.com</td>
                                    <td><strong>Password</strong><br>*********</td>
                                    <td><strong>Login phone number</strong><br>-</td>
                                    <td><strong>Contact email</strong><br>mw2000@gmail.com</td>
                                </tr>
                                <tr>
                                    <td><strong>Contact phone number</strong><br>+94 724113938</td>
                                    <td><strong>Social media platform</strong><br>Facebook:</td>
                                    <td><strong>Subscribe to the AliExpress Portals newsletter</strong><br>Not subscribed</td>
                                    <td><strong>Payee Name</strong><br>Ann</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>  
        </div>


        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-4 mb-2 d-flex align-items-center">
                        <h5 class="py-3" style="font-weight: bold;">Site Information</h5>
                    </div>
                    <div class="col-md-8 d-flex justify-content-end">
                        <button class="btn btn-primary">Add Site</button>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="card" style="background-color: #f8f9fa; box-shadow: none;">
                        <div class="card-body">
                            <div class="d-flex justify-content-end">
                                <span class="filter-option me-3 text-primary">Edit</span>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td><strong>Promotional attribute</strong><br>Non-network</td>
                                            <td><strong>Channel Type</strong><br>Social</td>
                                            <td><strong>Site name</strong><br>-</td>
                                            <td><strong>Site URL</strong><br>-</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Category</strong><br>-</td>
                                            <td><strong>Traffic source area</strong><br>Sri Lanka</td>
                                            <td><strong>Description</strong><br>-</td>
                                            <td><strong></strong><br></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>




    </div>
</main>

@endsection
