@extends('layouts.admin_main.master')

@section('content')

<style>
    .table thead {
        background-color: #f9f9f9; 
    }

    .btn-create {
        font-size: 0.8rem;
    }

    .action-buttons a {
        margin-right: 5px;
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
                <div class="container mt-4 mb-4">
                    <div class="table-responsive">
                        <table id="productTable" class="table table-hover text-nowrap ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Normal Price</th>
                                    <th scope="col">Affiliate</th>
                                    <th scope="col">Affiliate Price</th>
                                    <th scope="col">Commission%</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $index => $product)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>
                                        @if ($product->product_image)
                                            <img src="{{ asset('storage/' . $product->product_image) }}" alt="Product Image" style="max-width: 50px;">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>Rs {{ number_format($product->normal_price, 2) }}</td>
                                    <td>{{ $product->is_affiliate ? 'Yes' : 'No' }}</td>
                                    <td>Rs {{ $product->affiliate_price ? number_format($product->affiliate_price, 2) : '-' }}</td>
                                    <td>{{ $product->commission_percentage ? $product->commission_percentage . '%' : '-' }}</td>
                                    <td>Rs {{ number_format($product->total_price, 2) }}</td>
                                    <td class="action-buttons">
                                        <a href="{{ route('edit_product', $product->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('delete_product', $product->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i></button>
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
    $(document).ready(function() {
        $('#productTable').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50]],
            "pageLength": 10,
            "searching": true,
            "ordering": true,
            "info": true,
            "language": {
                "search": "_INPUT_",
                "searchPlaceholder": "Search Products"
            }
        });
    });
</script>

@endsection
