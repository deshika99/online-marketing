@extends('layouts.admin_main.master')

@section('content')
<style>
   .btn-create {
        font-size: 0.8rem;
    }

    .form-group {
        margin-bottom: 1rem;
        display: flex;
         flex-direction: column; 
    }

    .form-group label {
        font-weight: bold;
        display: block;
    }

    .form-control[readonly] {
        background-color: #e9ecef;
    }

    .card-body {
        padding: 1rem;
    }

    .card-container {
        display: flex;
        gap: 1rem;
    }

    .card-container .card {
        flex: 1;
    }

    .card-container .card:first-child {
        flex: 2;
    }

    .image-preview {
        display: flex;
        gap: 1rem;
        margin-top: 1rem;
        flex-wrap: wrap;
    }

    .image-preview img {
        max-width: 100px;
        height: auto;
        border: 1px solid #ddd;
        padding: 5px;
    }

    .inventory-group {
        margin-bottom: 1rem;
        display: flex;
        flex-direction: column;
    }

    .drop-zone {
        border: 2px dashed #ddd;
        border-radius: 5px;
        padding: 2rem;
        text-align: center;
        cursor: pointer;
        background-color: #f9f9f9;
    }

    .drop-zone p {
        margin: 0;
        color: #666;
    }

    .drop-zone img {
        position: relative;
    }

    .drop-zone .delete-btn {
        position: absolute;
        top: 5px;
        right: 5px;
        background: rgba(0, 0, 0, 0.5);
        color: #fff;
        border: none;
        border-radius: 50%;
        cursor: pointer;
    }

</style>



<main style="margin-top: 20px">
    <div class="container p-5"> 
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="py-2 mb-0 ms-4">Edit Product</h4>
        </div>

        <div class="card-container px-4">
            <div class="card py-3 px-5">
                <div class="card-body">
                    <form id="productForm" action="{{ route('update_product', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="productName">Product Name</label>
                                    <input type="text" id="productName" name="productName" class="form-control" placeholder="Enter product name" value="{{ old('productName', $product->product_name) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="productDesc">Product Description</label>
                                    <input type="text" id="productDesc" name="productDesc" class="form-control" placeholder="Enter product description" value="{{ old('productDesc', $product->product_description) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="productImages">Product Images</label>
                                <div id="dropZone" class="drop-zone">
                                    <p><i class="fas fa-images me-2"></i>Drag and drop images here or click to select</p>
                                    <input type="file" id="productImages" name="productImages[]" accept="image/*" multiple style="display: none;">
                                    <div class="image-preview" id="imagePreview">
                                        @if($product->images->isNotEmpty())
                                            @foreach($product->images as $image)
                                                <div class="image-container" data-image-id="{{ $image->id }}" style="position: relative; display: inline-block; margin-right: 10px;">
                                                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="Product Image" style="max-width: 100px;">
                                                    <button type="button" class="delete-btn" data-image-id="{{ $image->id }}" style="position: absolute; top: 5px; right: 5px; color: white; border: none; border-radius: 50%; width: 20px; height: 20px; text-align: center; line-height: 20px; cursor: pointer;">X</button>
                                                </div>
                                            @endforeach
                                        @else
                                            <p>No images uploaded</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            </div>
                            <div class="col-md-6">
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
                                    <label for="quantity">Quantity</label>
                                    <input type="number" id="quantity" name="quantity" class="form-control" placeholder="Enter quantity" value="{{ old('quantity', $product->quantity) }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="normalPrice">Normal Price</label>
                            <input type="number" id="normalPrice" name="normalPrice" class="form-control" placeholder="Enter normal price" step="0.01" value="{{ old('normalPrice', $product->normal_price) }}">
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" id="affiliateProduct" name="affiliateProduct" class="form-check-input" {{ old('affiliateProduct', $product->is_affiliate) ? 'checked' : '' }}>
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
    </div>
</main>


<script>
  
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



    //add images
    document.addEventListener('DOMContentLoaded', function() {
    const dropZone = document.getElementById('dropZone');
    const fileInput = document.getElementById('productImages');
    const previewContainer = document.getElementById('imagePreview');

    dropZone.addEventListener('click', () => fileInput.click());

    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        e.stopPropagation();
        dropZone.classList.add('dragover');
    });

    dropZone.addEventListener('dragleave', (e) => {
        e.preventDefault();
        e.stopPropagation();
        dropZone.classList.remove('dragover');
    });

    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        e.stopPropagation();
        dropZone.classList.remove('dragover');
        const files = e.dataTransfer.files;
        handleFiles(files);
    });

    fileInput.addEventListener('change', (e) => {
        const files = e.target.files;
        handleFiles(files);
    });

    function handleFiles(files) {
        Array.from(files).forEach(file => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth = '100px';

                const deleteBtn = document.createElement('button');
                deleteBtn.textContent = 'X';
                deleteBtn.className = 'delete-btn';
                deleteBtn.style.position = 'absolute';
                deleteBtn.style.top = '5px';
                deleteBtn.style.right = '5px';
                deleteBtn.style.color = 'white';
                deleteBtn.style.border = 'none';
                deleteBtn.style.borderRadius = '50%';
                deleteBtn.style.width = '20px';
                deleteBtn.style.height = '20px';
                deleteBtn.style.textAlign = 'center';
                deleteBtn.style.lineHeight = '20px';
                deleteBtn.style.cursor = 'pointer';
                deleteBtn.addEventListener('click', () => {
                    img.remove();
                    deleteBtn.remove();
                });

                const container = document.createElement('div');
                container.className = 'image-container';
                container.style.position = 'relative';
                container.style.display = 'inline-block';
                container.style.marginRight = '10px';
                container.appendChild(img);
                container.appendChild(deleteBtn);
                previewContainer.appendChild(container);
            };
            reader.readAsDataURL(file);
        });
    }

    // Handle delete button click for existing images
    previewContainer.addEventListener('click', function(e) {
        if (e.target.classList.contains('delete-btn')) {
            const container = e.target.closest('.image-container');
            const imageId = container.dataset.imageId;
            
            // If imageId is defined, mark the image for deletion
            if (imageId) {
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'deleteImages[]';
                hiddenInput.value = imageId;
                document.forms[0].appendChild(hiddenInput);
            }

            // Remove the image preview
            container.remove();
        }
    });
});



</script>

@endsection
