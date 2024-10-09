

@extends('layouts.user_sidebar') 

@section('dashboard-content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    /* Center popup container */
    .popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }

    .popup-content {
        background: white;
        padding: 20px;
        border-radius: 25px;
        width: 90%;
        max-width: 500px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center; /* Center the content */
    }

    .popup-content h2 {
        margin-top: 0;
        text-align: center;
    }

    .form-container {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        position: relative;
        justify-content: center; /* Center form elements horizontally */
    }

    .form-container .icon-input {
        position: relative;
        width: 95%;
    }

    .form-container .icon-input i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #ccc;
    }

    .form-container input {
        width: 100%;
        padding: 10px 10px 10px 40px;
        border-radius: 25px;
        border: 1px solid #ccc;
        outline: none;
    }

    .form-container div {
        width: 48%;
    }

    .form-container .full-width {
        width: 100%;
    }

    .close-popup {
        cursor: pointer;
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 25px;
        color: #333;
    }

    /* Center form buttons */
    .form-buttons {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 20px;
    }

    .form-buttons button {
        padding: 10px 20px;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        font-size: 16px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .save-btn {
        background-color: #4CAF50;
        color: white;
    }

    .edit-btn {
        background-color: #f0ad4e;
        color: white;
    }

    .delete-btn {
        background-color: #d9534f;
        color: white;
    }

    .open-popup-btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin: 20px;
    }
</style>

<h3 class="py-2 px-2">Address Book</h3>

<!-- Button to open the popup -->
<button class="btn btn-primary mt-3" onclick="openPopup()">+ Add New</button>

<!-- Popup container -->
<div class="popup" id="popup">
    <div class="popup-content">
        <span class="close-popup" onclick="closePopup()">&times;</span>
        <h2>Add Address</h2>
        <form action="{{ route('storeAddress') }}" method="POST">
    @csrf
    
    <div class="form-container">
        <div class="icon-input">
            <i class="fas fa-user"></i>
            <input type="text" name="first_name" placeholder="First name" value="{{ old('full_name', auth()->user()->name) }}" required>
        </div>
        <div class="icon-input">
            <i class="fas fa-phone"></i>
            <input type="text" name="phone" placeholder="Phone" value="{{ old('phone_num', auth()->user()->phone_num) }}" required>
        </div>
        <div class="icon-input">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" placeholder="Email" value="{{ old('email', auth()->user()->email) }}" required>
        </div>
        <div class="icon-input">
            <i class="fas fa-home"></i>
            <input type="text" name="address" placeholder="Street Address" value="{{ old('address', auth()->user()->address) }}" required>
        </div>
        <div class="icon-input">
            <i class="fas fa-home"></i>
            <input type="text" name="apartment" placeholder="Apartment, Suite, Unit (Optional)" >
        </div>
        <div class="icon-input">
            <i class="fas fa-city"></i>
            <input type="text" name="city" placeholder="City"  required>
        </div>
        <div class="icon-input">
            <i class="fas fa-mail-bulk"></i>
            <input type="text" name="postal_code" placeholder="Postal code"  required>
        </div>
    </div>
    <!-- Form action buttons -->
    <div class="form-buttons">
                <button type="button" class="edit-btn" onclick="editForm()">
                    <i class="fas fa-edit"></i> Edit
                </button>
                <form action="{{ route('deleteAddress') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="delete-btn">
                        <i class="fas fa-trash-alt"></i> Delete
                    </button>
                </form>
                <button type="submit" class="save-btn">
                    <i class="fas fa-check"></i> Save
                </button>
            </div>
            <!-- Display success message -->
    

        

    </div>
</div>

@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
<script>
    function openPopup() {
        document.getElementById("popup").style.display = "flex";
    }

    function closePopup() {
        document.getElementById("popup").style.display = "none";
    }

    function editForm() {
        alert("Edit action triggered!");
    }

    function deleteForm() {
        if (confirm("Are you sure you want to delete this form?")) {
            alert("Form deleted!");
            document.querySelector("form").reset();
        }
    }
</script>

@endsection                                             