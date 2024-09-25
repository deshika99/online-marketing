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
                            <option value="{{ $category->parent_category }}">{{ $category->parent_category }}</option>
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
                                    data-category="{{ $product->product_category }}" 
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
                                        <a href="{{ route('product-details', $product->id) }}" class="btn btn-info btn-sm view-btn mb-1" 
                                        style="font-size: 0.75rem; padding: 0.25rem 0.5rem;"> <i class="fas fa-eye"></i></a>
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






<script>
document.addEventListener('DOMContentLoaded', function () {
    function filterProducts() {
        const categoryFilter = document.getElementById('category-filter').value;
        const affiliateOnly = document.getElementById('affiliate-only').checked;

        const rows = document.querySelectorAll('.product-row');

        rows.forEach(row => {
            const categoryName = row.getAttribute('data-category');
            const isAffiliate = row.getAttribute('data-affiliate') === 'true';

            const matchCategory = categoryFilter === 'all' || categoryFilter === categoryName;
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



});

    </script>

@endsection
