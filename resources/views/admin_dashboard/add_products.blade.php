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
            <h4 class="py-2 mb-0 ms-4">Add Products</h4>
        </div>

        <div class="card-container px-4">
            <!-- Product Form Card -->
            <div class="card py-3 px-5">
                <div class="card-body">
                    <form id="productForm" action="{{ route('store_product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="productName">Product Name</label>
                                    <input type="text" id="productName" name="productName" class="form-control" placeholder="Enter product name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="productDesc">Product Description</label>
                                    <input type="text" id="productDesc" name="productDesc" class="form-control" placeholder="Enter product description">
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
                                        <div class="image-preview" id="imagePreview"></div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select id="category" name="category" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->parent_category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" id="quantity" name="quantity" class="form-control" placeholder="Enter quantity">
                                </div>
                            </div>
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
    let selectedFiles = [];

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
        const files = Array.from(e.dataTransfer.files);
        handleFiles(files);
    });

    fileInput.addEventListener('change', (e) => {
        const files = Array.from(e.target.files);
        handleFiles(files);
    });

    function handleFiles(files) {
        files.forEach(file => {
            selectedFiles.push(file);

            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth = '100px';
                img.style.maxHeight = '100px';
                img.style.margin = '5px';
                
                const deleteBtn = document.createElement('button');
                deleteBtn.textContent = 'X';
                deleteBtn.className = 'delete-btn';
                deleteBtn.addEventListener('click', () => {
                    img.remove();
                    deleteBtn.remove();
                    selectedFiles = selectedFiles.filter(f => f !== file);
                    updateFileInput();
                });

                const container = document.createElement('div');
                container.style.position = 'relative';
                container.appendChild(img);
                container.appendChild(deleteBtn);
                previewContainer.appendChild(container);
            };
            reader.readAsDataURL(file);
        });

        updateFileInput();
    }

    function updateFileInput() {
        const dataTransfer = new DataTransfer();
        selectedFiles.forEach(file => dataTransfer.items.add(file));
        fileInput.files = dataTransfer.files;
    }
});


</script>

@endsection
