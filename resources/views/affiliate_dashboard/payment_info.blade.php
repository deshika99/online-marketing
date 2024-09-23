@extends('layouts.affiliate_main.master')

@section('content')
<style>
    .table thead {
        background-color: #9FC5E8;
    }
    h3{
        text-align:center;
    }
    p{
        text-align:center;
    }
    .section{
        padding:30px;
    }
    .btun{
        align:center;

    }
    .card {
        padding: 10px;
        margin-top: 20px;
        border: 20px;
        margin-left: 40px;
        margin-right: 40px;

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
        
</style>

<main style="margin-top:  58px">
    <div class="container pt-4 px-4">
        <h2 class="py-3">Payment Information</h2>
        <br>
        <br>
    <div class =card>
    <div class =section>
        <h3>Bank Account Not Linked</h3>
        <p>You have not linked any bank account</p>
        <br>
        <br>
        <br>
    </div>    

    <div style="display: flex; justify-content: center;">
        <button type="button" id="toggleSelectAll2" class="btn btn-secondary btn-sm" style="font-size: rem; width: 45%;">
        <a href="{{ route('bank.acc') }}" class="btn btn-secondary btn-sm">  ADD BANK ACCOUNT</a>
        </button>
    </div
    
    
