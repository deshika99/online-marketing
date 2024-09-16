@extends('layouts.admin_main.master')

@section('content')

<style> 
.modal-body {
    padding: 1rem;
}

.modal-details p {
    margin-bottom: 1rem;
    line-height: 1.4; 
}

.modal-details strong {
    display: inline-block;
    width: 150px; 
}


#modal-product-image {
    max-width: 20%;
    height: auto;
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
            <h3 class="py-3 mb-0">Products</h3>
            <a href="{{ route('add_products') }}" class="btn btn-primary btn-create">Add Products</a>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="container  mb-4">
                    <div class="d-flex justify-content-between mb-4">
                        <select id="category-filter" class="form-select w-25" style="font-size:15px;">
                            <option value="all">All Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->parent_category }}</option>
                            @endforeach
                        </select>
                        <div style="font-size:15px;">
                            <label for="affiliate-only" class="form-check-label">View Affiliate Products Only</label>
                            <input type="checkbox" id="affiliate-only" class="form-check-input">
                        </div>
                    </div>

                    <div class="table-responsive p-0">
                        <table id="example" class="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col" style="width:5%">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col" style="width:20%">Category</th>
                                    <th scope="col" id="normal-price-header" style="display:none;">Normal Price</th>
                                    <th scope="col" style="width:10%">Quantity</th>
                                    <th scope="col" id="affiliate-price-header" style="display:none;">Affiliate Price</th>
                                    <th scope="col" id="commission-header" style="display:none;">Commission%</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col" style="width:15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($products as $index => $product)
                                <tr class="product-row" 
                                    data-category="{{ $product->category_id }}" 
                                    data-affiliate="{{ $product->is_affiliate ? 'true' : 'false' }}" 
                                    data-id="{{ $product->product_id }}" 
                                    data-images="{{ $product->images->toJson() }}" 
                                    data-variations="{{ $product->variations->toJson() }}">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>
                                        @if ($product->images->isNotEmpty())
                                            <img src="{{ asset('storage/' . $product->images->first()->image_path) }}" alt="Product Image" style="max-width: 50px;">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>{{ $product->product_category ?? 'No Category' }}</td>
                                    <td class="normal-price" style="display:none;">Rs {{ number_format($product->normal_price, 2) }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td class="affiliate-price" style="display:none;">Rs {{ $product->affiliate_price ? number_format($product->affiliate_price, 2) : '-' }}</td>
                                    <td class="commission" style="display:none;">{{ $product->commission_percentage ? $product->commission_percentage . '%' : '-' }}</td>
                                    <td>Rs {{ number_format($product->total_price, 2) }}</td>
                                    <td class="action-buttons">
                                        <button class="btn btn-info btn-sm mb-1 view-btn" style="font-size: 0.75rem; padding: 0.25rem 0.5rem;" data-id="{{ $product->product_id }}" data-description="{{ $product->product_description }}">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <a href="{{ route('edit_product', $product->id) }}" class="btn btn-warning btn-sm mb-1" style="font-size: 0.75rem; padding: 0.25rem 0.5rem;"><i class="fas fa-edit"></i></a>
                                        <form id="delete-form-{{ $product->id }}" action="{{ route('delete_product', $product->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm mb-1" style="font-size: 0.75rem; padding: 0.25rem 0.5rem;" onclick="confirmDelete('delete-form-{{ $product->id }}', 'you want to delete this product?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Product Details Modal -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg-8">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Product Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-details">
                    <div class="row mb-2">
                        <div class="col-md-3"><strong>Name:</strong></div>
                        <div class="col-md-9" id="modal-product-name"></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3"><strong>Images:</strong></div>
                        <div class="col-md-9" id="modal-product-images" class="d-flex flex-wrap"></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3"><strong>Description:</strong></div>
                        <div class="col-md-9" id="modal-product-desc"></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3"><strong>Normal Price:</strong></div>
                        <div class="col-md-9">Rs <span id="modal-normal-price"></span></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3"><strong>Affiliate:</strong></div>
                        <div class="col-md-9" id="modal-affiliate"></div>
                    </div>
                    
                    <!-- Affiliate fields -->
                    <div class="affiliate-fields">
                        <div class="row mb-2">
                            <div class="col-md-3"><strong>Affiliate Price:</strong></div>
                            <div class="col-md-9">Rs <span id="modal-affiliate-price"></span></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3"><strong>Commission:</strong></div>
                            <div class="col-md-9" id="modal-commission"></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3"><strong>Total Price:</strong></div>
                            <div class="col-md-9">Rs <span id="modal-total-price"></span></div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3"><strong>Sizes:</strong></div>
                        <div class="col-md-9" id="modal-sizes"></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3"><strong>Colors:</strong></div>
                        <div class="col-md-9 d-flex" id="modal-colors"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<script>
document.addEventListener('DOMContentLoaded', function () {
    function filterProducts() {
        const categoryFilter = document.getElementById('category-filter').value;
        const affiliateOnly = document.getElementById('affiliate-only').checked;

        const rows = document.querySelectorAll('.product-row');

        rows.forEach(row => {
            const categoryId = row.getAttribute('data-category');
            const isAffiliate = row.getAttribute('data-affiliate') === 'true';

            const matchCategory = categoryFilter === 'all' || categoryFilter === categoryId;
            const matchAffiliate = !affiliateOnly || isAffiliate;

            if (matchCategory && matchAffiliate) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    document.getElementById('category-filter').addEventListener('change', filterProducts);
    document.getElementById('affiliate-only').addEventListener('change', filterProducts);
    filterProducts();



    // Product Details Modal
    document.querySelectorAll('.view-btn').forEach(button => {
    button.addEventListener('click', function () {
        const row = this.closest('.product-row');
        const name = row.querySelector('td:nth-child(2)').textContent;
        const images = JSON.parse(row.getAttribute('data-images')); 
        const desc = this.getAttribute('data-description');
        const normalPrice = row.querySelector('.normal-price').textContent.replace('Rs ', '');
        const affiliate = row.getAttribute('data-affiliate') === 'true' ? 'Yes' : 'No';
        const affiliatePrice = row.querySelector('.affiliate-price').textContent.replace('Rs ', '');
        const commission = row.querySelector('.commission').textContent;
        const totalPrice = row.querySelector('td:nth-child(9)').textContent.replace('Rs ', '');
        const variations = JSON.parse(row.getAttribute('data-variations'));

        document.getElementById('modal-product-name').textContent = name;

        const imageContainer = document.getElementById('modal-product-images');
        imageContainer.innerHTML = ''; 

        images.forEach(image => {
            const img = document.createElement('img');
            img.src = `/storage/${image.image_path}`;
            img.className = 'img-fluid me-2 mb-2';
            img.style.maxWidth = '100px'; 
            imageContainer.appendChild(img);
        });

        document.getElementById('modal-product-desc').textContent = desc;
        document.getElementById('modal-normal-price').textContent = normalPrice;

        if (affiliate === 'Yes') {
            document.getElementById('modal-affiliate').textContent = 'Yes';
            document.querySelector('.affiliate-fields').style.display = ''; 
            document.getElementById('modal-affiliate-price').textContent = affiliatePrice;
            document.getElementById('modal-commission').textContent = commission;
            document.getElementById('modal-total-price').textContent = totalPrice;
        } else {
            document.getElementById('modal-affiliate').textContent = 'No';
            document.querySelector('.affiliate-fields').style.display = 'none'; 
        }

        const sizesContainer = document.getElementById('modal-sizes');
        const colorsContainer = document.getElementById('modal-colors');

        sizesContainer.innerHTML = '';  
        colorsContainer.innerHTML = ''; 

        const sizes = [];
        const colors = [];

        variations.forEach(variation => {
            if (variation.type.toLowerCase() === 'size') {
                sizes.push(variation.value);
            } else if (variation.type.toLowerCase() === 'color') {
                colors.push(variation.value);
            }
        });

        if (sizes.length > 0) {
            sizesContainer.textContent = sizes.join(', ');
        } else {
            sizesContainer.textContent = '-';
        }

        if (colors.length > 0) {
            colors.forEach(color => {
                const colorCircle = document.createElement('span');
                colorCircle.className = 'color-circle';
                colorCircle.style.backgroundColor = color; 
                colorCircle.style.width = '20px';
                colorCircle.style.height = '20px';
                colorCircle.style.display = 'inline-block';
                colorCircle.style.borderRadius = '50%';
                colorCircle.style.marginRight = '10px';
                colorsContainer.appendChild(colorCircle);
            });
        } else {
            colorsContainer.textContent = '-';
        }

        const modalElement = document.getElementById('productModal');
        const modal = new bootstrap.Modal(modalElement);
        modal.show();
    });
});



});

    </script>

@endsection
