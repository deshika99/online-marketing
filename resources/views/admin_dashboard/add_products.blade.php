@extends('layouts.admin_main.master')

@section('content')
<style>
  
    .btn-create {
        font-size: 0.8rem;
    }

    .form-group {
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
    }

    .form-group label {
        width: 200px;
        margin-bottom: 0;
        font-weight: bold;
    }

    .form-group input {
        flex: 1;
    }

    .form-check {
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
    }

    .form-check label {
        margin-left: 10px;
    }

    .form-control[readonly] {
        background-color: #e9ecef;
    }
</style>  


<main style="margin-top: 58px">
    <div class="container pt-4 px-4"> 
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="py-3 mb-0">Add Products</h4>
        </div>

        <div class="card p-4 ">
            <div class="card-body me-3">
            <form id="productForm" action="{{ route('store_product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="productName">Product Name</label>
                    <input type="text" id="productName" name="productName" class="form-control" placeholder="Enter product name">
                </div>

                <div class="form-group">
                    <label for="productDesc">Product Description</label>
                    <input type="text" id="productDesc" name="productDesc" class="form-control" placeholder="Enter product description">
                </div>

                <div class="form-group">
                    <label for="productImage">Product Image</label>
                    <input type="file" id="productImage" name="productImage" class="form-control" accept="image/*">
                </div>

                <div class="form-group">
                    <img id="imagePreview" src="#" alt="Image Preview" style="display: none; max-width: 10%; height: auto;"/>
                </div>

                <div class="form-group">
                    <label for="normalPrice">Normal Price</label>
                    <input type="number" id="normalPrice" name="normalPrice" class="form-control" placeholder="Enter normal price" step="0.01">
                </div>
                
                <div class="form-group">
                    <div class="form-check">
                        <input type="checkbox" id="affiliateProduct" name="affiliateProduct" class="form-check-input">
                        <label class="form-check-label" for="affiliateProduct">Affiliate the Product</label>
                    </div>
                </div>

                <div class="form-group" id="affiliatePriceGroup" style="display: none;">
                    <label for="affiliatePrice">Affiliate Price</label>
                    <input type="number" id="affiliatePrice" name="affiliatePrice" class="form-control" placeholder="Enter affiliate price" step="0.01">
                </div>

                <div class="form-group" id="commissionGroup" style="display: none;">
                    <label for="commissionPercentage">Commission %</label>
                    <input type="number" id="commissionPercentage" name="commissionPercentage" class="form-control" placeholder="Enter commission percentage" step="0.01" min="0" max="100">
                </div>

                <div class="form-group">
                    <label for="totalPrice">Total Price</label>
                    <input type="text" id="totalPrice" name="totalPrice" class="form-control" readonly>
                </div>

                <button type="submit" class="btn btn-success btn-create">Add</button>
            </form>

            </div>
        </div>
    </div>
</main>


<script>

document.getElementById('productImage').addEventListener('change', function(event) {
        const [file] = event.target.files;
        if (file) {
            const preview = document.getElementById('imagePreview');
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const affiliateCheckbox = document.getElementById('affiliateProduct');
        const affiliatePriceGroup = document.getElementById('affiliatePriceGroup');
        const commissionGroup = document.getElementById('commissionGroup');
        const normalPriceInput = document.getElementById('normalPrice');
        const affiliatePriceInput = document.getElementById('affiliatePrice');
        const commissionPercentageInput = document.getElementById('commissionPercentage');
        const totalPriceInput = document.getElementById('totalPrice');

        affiliateCheckbox.addEventListener('change', function() {
            if (affiliateCheckbox.checked) {
                affiliatePriceGroup.style.display = 'flex'; // Use 'flex' to align items
                commissionGroup.style.display = 'flex'; // Use 'flex' to align items
            } else {
                affiliatePriceGroup.style.display = 'none';
                commissionGroup.style.display = 'none';
                affiliatePriceInput.value = '';
                commissionPercentageInput.value = '';
                updateTotalPrice();
            }
        });

        function updateTotalPrice() {
            let normalPrice = parseFloat(normalPriceInput.value) || 0;
            let affiliatePrice = parseFloat(affiliatePriceInput.value) || 0;
            let commissionPercentage = parseFloat(commissionPercentageInput.value) || 0;
            let totalPrice = normalPrice;

            if (affiliateCheckbox.checked) {
                totalPrice = affiliatePrice + (affiliatePrice * (commissionPercentage / 100));
            }

            totalPriceInput.value = totalPrice.toFixed(2);
        }

        normalPriceInput.addEventListener('input', updateTotalPrice);
        affiliatePriceInput.addEventListener('input', updateTotalPrice);
        commissionPercentageInput.addEventListener('input', updateTotalPrice);
    });
</script>

@endsection
