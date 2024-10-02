@extends('layouts.admin_main.master') 

@section('content')

<style>
    .action-buttons {
        padding: 5px;
        width: 35px;
    }

    .tab-content .table {
        margin-top: 20px;
    }

    .review-images {
        display: flex;
        gap: 10px;
    }

    .review-images img {
        width: 15%;
        height: auto;
        object-fit: cover;
    }

    .dropdown-menu {
        min-width: 100px;
    }

    .reviewer-profile {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .reviewer-profile img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
    }

    .star-rating {
        color: gold;
    }

    .action-icons i {
        font-size: 16px;
        margin-right: 10px;
        cursor: pointer;
    }

    .action-icons i.edit-icon {
        color: #007bff;
    }

    .action-icons i.delete-icon {
        color: #dc3545;
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
            <h3 class="py-3 mb-0">Manage Reviews</h3>
        </div>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active fw-bold" id="published-tab" data-bs-toggle="tab" href="#published" role="tab" aria-controls="published" aria-selected="true">Published</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link fw-bold" id="pending-tab" data-bs-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="false">
                    Pending <span class="badge bg-danger">{{ $pendingReviews->count() }}</span>
                </a>
            </li> 
        </ul>

        <div class="tab-content" id="myTabContent">
            <!-- Published Tab -->
            <div class="tab-pane fade show active" id="published" role="tabpanel" aria-labelledby="published-tab">
                <div class="card mt-1">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product</th>
                                        <th>Reviewer</th>
                                        <th style="width: 30%">Review</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($publishedReviews as $review)
                                    @foreach($publishedReviews as $review)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $review->product->product_name }}</td>
                                            <td>
                                                <div class="reviewer-profile">
                                                    <img src="{{ $review->user->profile_picture }}" >
                                                    <span>{{ $review->user->name }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                {{ $review->comment }}
                                                <div class="star-rating">
                                                    @for ($i = 0; $i < $review->rating; $i++)
                                                        <i class="fas fa-star"></i>
                                                    @endfor
                                                </div>
                                            </td>
                                            <td>{{ $review->created_at->format('Y-m-d') }}</td>
                                            <td><span class="badge bg-success">{{ ucfirst($review->status) }}</span></td>
                                            <td>
                                                <div class="action-icons">
                                                    <a href="#" onclick="deleteReview({{ $review->id }})">
                                                        <i class="fas fa-trash-alt delete-icon"></i>
                                                    </a>
                                                </div>
                                                <form action="" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm mb-1" style="font-size: 0.75rem; padding: 0.25rem 0.5rem;" onclick="confirmDelete('')">
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

            <!-- Pending Tab -->
            <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                <div class="card mt-1">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product</th>
                                        <th>Reviewer</th>
                                        <th style="width: 30%">Review</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pendingReviews as $review)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $review->product->product_name }}</td>
                                            <td>
                                                <div class="reviewer-profile">
                                                    <img src="{{ $review->user->profile_picture }}" >
                                                    <span>{{ $review->user->name }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                {{ $review->comment }}
                                                <div class="star-rating">
                                                    @for ($i = 0; $i < $review->rating; $i++)
                                                        <i class="fas fa-star"></i>
                                                    @endfor
                                                </div>
                                            </td>
                                            <td>{{ $review->created_at->format('Y-m-d') }}</td>
                                            <td><span class="badge bg-warning">{{ ucfirst($review->status) }}</span></span></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-light" type="button" id="dropdownMenuButton{{ $review->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                <a href="" class="btn btn-success btn-sm">Publish</a>
                                                <form action="" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $review->id }}">
                                                        <li><a class="dropdown-item" href="{{ route('reviews.edit', $review->id) }}">Edit</a></li>
                                                        <li><a class="dropdown-item" href="#" onclick="approveReview({{ $review->id }})">Published</a></li>
                                                        <li><a class="dropdown-item text-danger" href="#" onclick="deleteReview({{ $review->id }})">Delete</a></li>
                                                    </ul>
                                                </div>
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
    </div>
</main>

<script>
    function deleteReview(reviewId) {
        console.log('Delete review with ID:', reviewId);
    }

    // JavaScript function for approving reviews
    function approveReview(reviewId) {
        if (confirm('Are you sure you want to approve this review?')) {
            fetch(`/admin/manage_reviews/${reviewId}/approve`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}', // Add CSRF token for security
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    status: 'published'
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload(); // Reload the page to see the updated reviews
                } else {
                    alert('Error approving review.');
                }
            })
            .catch(error => console.error('Error:', error));
        }
    }
</script>
@endsection
