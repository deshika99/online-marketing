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
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                <tr class="product-row" data-category="{{ $product->category_id }}" data-affiliate="{{ $product->is_affiliate ? 'true' : 'false' }}" data-id="{{ $product->id }}">
                                    <td>{{ $index + 1 }}</td>    
                                    <td>{{ $product->product_name }}</td>
                                    <td>
                                        @if ($product->product_image)
                                            <img src="{{ asset('storage/' . $product->product_image) }}" alt="Product Image" style="max-width: 50px;">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>{{ $product->category->name ?? 'No Category' }}</td>
                                    <td class="normal-price" style="display:none;">Rs {{ number_format($product->normal_price, 2) }}</td>
                                    <td>10</td>
                                    <td class="affiliate-price" style="display:none;">Rs {{ $product->affiliate_price ? number_format($product->affiliate_price, 2) : '-' }}</td>
                                    <td class="commission" style="display:none;">{{ $product->commission_percentage ? $product->commission_percentage . '%' : '-' }}</td>
                                    <td>Rs {{ number_format($product->total_price, 2) }}</td>
                                    <td class="action-buttons">
                                        <button class="btn btn-info btn-sm mb-1 view-btn" style="font-size: 0.75rem; padding: 0.25rem 0.5rem;" data-id="{{ $product->id }}" data-description="{{ $product->product_description }}">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <a href="{{ route('edit_product', $product->id) }}" class="btn btn-warning btn-sm mb-1" style="font-size: 0.75rem; padding: 0.25rem 0.5rem;"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('delete_product', $product->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm mb-1" style="font-size: 0.75rem; padding: 0.25rem 0.5rem;" onclick="return confirm('Are you sure?')">
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
    <div class="modal-dialog modal-lg-10">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Product Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-details">
                    <p class="mt-2"><strong>Name:</strong> <span id="modal-product-name"></span></p>
                    <p class=""><strong>Image:</strong> <img id="modal-product-image" src="#" alt="Product Image" class="img-fluid"></p>
                    <p class=""><strong>Description:</strong><span id="modal-product-desc"></span></p>
                    <p class=""><strong>Normal Price:</strong> Rs <span id="modal-normal-price"></span></p>
                    <p class=""><strong>Quantity:</strong> <span id="modal-quantity"></span></p>
                    <p class=""><strong>Category:</strong> <span id="modal-category"></span></p>
                    <p class=""><strong>Affiliate:</strong> <span id="modal-affiliate"></span></p>
                    <p class=""><strong>Affiliate Price:</strong> Rs <span id="modal-affiliate-price"></span></p>
                    <p class=""><strong>Commission:</strong> <span id="modal-commission"></span></p>
                    <p class=""><strong>Total Price:</strong> Rs <span id="modal-total-price"></span></p>
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
            const imageSrc = row.querySelector('td img') ? row.querySelector('td img').src : '';
            const desc = this.getAttribute('data-description');
            const normalPrice = row.querySelector('.normal-price').textContent.replace('Rs ', '');
            const quantity = row.querySelector('td:nth-child(6)').textContent;
            const category = row.querySelector('td:nth-child(4)').textContent;
            const affiliate = row.getAttribute('data-affiliate') === 'true' ? 'Yes' : 'No';
            const affiliatePrice = row.querySelector('.affiliate-price').textContent.replace('Rs ', '');
            const commission = row.querySelector('.commission').textContent;
            const totalPrice = row.querySelector('td:nth-child(9)').textContent.replace('Rs ', '');

            document.getElementById('modal-product-name').textContent = name;
            document.getElementById('modal-product-image').src = imageSrc;
            document.getElementById('modal-product-desc').textContent = desc;
            document.getElementById('modal-normal-price').textContent = normalPrice;
            document.getElementById('modal-quantity').textContent = quantity;
            document.getElementById('modal-category').textContent = category;
            document.getElementById('modal-affiliate').textContent = affiliate;
            document.getElementById('modal-affiliate-price').textContent = affiliatePrice;
            document.getElementById('modal-commission').textContent = commission;
            document.getElementById('modal-total-price').textContent = totalPrice;

            const modalElement = document.getElementById('productModal');
            const modal = new bootstrap.Modal(modalElement);
            modal.show();
        });
    });
});

    </script>

@endsection
