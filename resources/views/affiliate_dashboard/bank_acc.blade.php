@extends('layouts.affiliate_main.master')

@section('content')
<style>
    .table thead {
        background-color: #f9f9f9;
    }

    .add-bank-account-container {
        width: 100%;
        max-width: 500px; /* Limits the max width for larger screens */
        margin: 0 auto; /* Centers the form container on the page */
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .add-bank-account-container h1 {
        text-align: center;
        margin-bottom: 20px;
        font-size: 24px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        font-size: 16px;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
        padding: 10px 16px;
        border-radius: 4px;
        cursor: pointer;
        display: block;
        width: 100%;
        text-align: center;
        font-size: 16px;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .add-bank-account-container {
            padding: 15px;
        }

        .add-bank-account-container h1 {
            font-size: 20px;
        }

        .form-group label {
            font-size: 14px;
        }

        .form-control {
            font-size: 14px;
            padding: 8px;
        }

        .btn-primary {
            font-size: 14px;
            padding: 8px 14px;
        }
    }

    @media (max-width: 576px) {
        .add-bank-account-container {
            padding: 10px;
        }

        .add-bank-account-container h1 {
            font-size: 18px;
        }

        .form-group label {
            font-size: 13px;
        }

        .form-control {
            font-size: 13px;
            padding: 7px;
        }

        .btn-primary {
            font-size: 13px;
            padding: 7px 12px;
        }
    }
</style>

<div class="add-bank-account-container">
    <h1>Add New Bank Account</h1>
    <form action="/affiliate/dashboard/payment/bank_acc" method="POST">
        @csrf
        <div class="form-group">
            <label for="beneficiary_bank_country">Beneficiary Bank Country or Region</label>
            <input type="text" class="form-control" id="beneficiary_bank_country" name="beneficiary_bank_country">
        </div>
        <div class="form-group">
            <label for="currency">Currency</label>
            <input type="text" class="form-control" id="currency" name="currency">
        </div>
        <div class="form-group">
            <label for="card_holder_name">Card Holder Name</label>
            <input type="text" class="form-control" id="card_holder_name" name="card_holder_name">
        </div>
        <div class="form-group">
            <label for="bic">BIC</label>
            <input type="text" class="form-control" id="bic" name="bic">
        </div>
        <div class="form-group">
            <label for="beneficiary_bank_name">Beneficiary Bank Name</label>
            <input type="text" class="form-control" id="beneficiary_bank_name" name="beneficiary_bank_name">
        </div>
        <div class="form-group">
            <label for="account_num">Account Number</label>
            <input type="text" class="form-control" id="account_num" name="account_num">
        </div>
        <div class="form-group">
            <label for="routing_num">Routing Number</label>
            <input type="text" class="form-control" id="routing_num" name="routing_num">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>

<script>
    // Example of a simple fetch request (for your reference)
    fetch('/affiliate/dashboard/payment/bank_acc', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            // Example payload to be sent with the request
        })
    });
</script>
@endsection
