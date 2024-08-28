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
        width: 92%; 
    }

    .form-group select.form-control {
        width: 80%; 
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
            <h4 class="py-3 mb-0">Edit Product</h4>
        </div>

        <div class="card p-4">
            <div class="card-body me-3">
                <form id="productForm" action="{{ route('update_product', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="productName">Product Name</label>
                        <input type="text" id="productName" name="productName" class="form-control" value="{{ old('productName', $product->product_name) }}" placeholder="Enter product name">
                    </div>

                    <div class="form-group">
                        <label for="productDesc">Product Description</label>
                        <input type="text" id="productDesc" name="productDesc" class="form-control" value="{{ old('productDesc', $product->product_description) }}" placeholder="Enter product description">
                    </div>

                    <div class="form-group">
                        <label for="productImage">Product Image</label>
                        <input type="file" id="productImage" name="productImage" class="form-control" accept="image/*">
                    </div>

                    <div class="form-group">
                        @if ($product->product_image)
                            <img id="imagePreview" src="{{ asset('storage/' . $product->product_image) }}" alt="Product Image" style="max-width: 10%; height: auto;"/>
                        @else
                            <img id="imagePreview" src="#" alt="Image Preview" style="display: none; max-width: 10%; height: auto;"/>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" name="category" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->product_category == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="normalPrice">Normal Price</label>
                        <input type="number" id="normalPrice" name="normalPrice" class="form-control" value="{{ old('normalPrice', $product->normal_price) }}" placeholder="Enter normal price" step="0.01">
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" name="affiliateProduct" id="affiliateProduct" {{ old('affiliateProduct', $product->is_affiliate) ? 'checked' : '' }}>
                            <label class="form-check-label" for="affiliateProduct">Affiliate the Product</label>
                        </div>
                    </div>

                    <div class="form-group" id="affiliatePriceGroup" style="{{ $product->is_affiliate ? 'display: flex;' : 'display: none;' }}">
                        <label for="affiliatePrice">Affiliate Price</label>
                        <input type="number" id="affiliatePrice" name="affiliatePrice" class="form-control" value="{{ old('affiliatePrice', $product->affiliate_price) }}" placeholder="Enter affiliate price" step="0.01">
                    </div>

                    <div class="form-group" id="commissionGroup" style="{{ $product->is_affiliate ? 'display: flex;' : 'display: none;' }}">
                        <label for="commissionPercentage">Commission %</label>
                        <input type="number" id="commissionPercentage" name="commissionPercentage" class="form-control" value="{{ old('commissionPercentage', $product->commission_percentage) }}" placeholder="Enter commission percentage" step="0.01" min="0" max="100">
                    </div>

                    <div class="form-group">
                        <label for="totalPrice">Total Price</label>
                        <input type="text" id="totalPrice" name="totalPrice" class="form-control" value="{{ old('totalPrice', $product->total_price) }}" readonly>
                    </div>

                    <button type="submit" class="btn btn-success btn-create">Update</button>
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
                affiliatePriceGroup.style.display = 'flex'; 
                commissionGroup.style.display = 'flex'; 
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
