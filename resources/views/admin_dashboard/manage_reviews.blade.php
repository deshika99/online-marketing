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
                <a class="nav-link fw-bold" id="pending-tab" data-bs-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="false">Pending</a>
            </li> 
        </ul>

        <div class="tab-content" id="myTabContent">
            <!-- Published Tab -->
            <div class="tab-pane fade show active" id="published" role="tabpanel" aria-labelledby="published-tab">
                <div class="card mt-1">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table" style="width:100%">
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
                                    @foreach($write-s as $review)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $review->product->images->first()->image_path) }}" alt="Product Image" width="50" height="auto">
                                                <div style="display: inline-block; vertical-align: top;">{{ $review->product->product_name }}</div>
                                            </td>
                                            <td>
                                                <img src="{{ asset('path_to_user_images/' . $review->user->profile_image) }}" alt="User Image" width="40" height="auto" style="border-radius: 50%;">
                                                <div style="display: inline-block; vertical-align: top;">{{ $review->user->name }}</div>
                                            </td>
                                            <td>
                                                <div class="rating text-warning">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <i class="{{ $i <= $review->rating ? 'fas' : 'far' }} fa-star"></i>
                                                    @endfor
                                                </div>
                                                <p>{{ $review->comment }}</p>
                                                <div class="review-images">
                                                    @foreach ($review->media as $media)
                                                        @if ($media->media_type === 'image')
                                                            <img src="{{ asset('storage/' . $media->media_path) }}" alt="Review Image">
                                                        @elseif ($media->media_type === 'video')
                                                            <video width="100" controls>
                                                                <source src="{{ asset('storage/' . $media->media_path) }}" type="video/mp4">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td>{{ $review->created_at->format('d/m/Y') }}</td>
                                            <td><span class="badge bg-success">Published</span></td>
                                            <td>
                                                <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" style="display:inline;">
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
                                    @foreach($pendingReviews as $review)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $review->product->images->first()->image_path) }}" alt="Product Image" width="50" height="auto">
                                                <div style="display: inline-block; vertical-align: top;">{{ $review->product->product_name }}</div>
                                            </td>
                                            <td>
                                                <img src="{{ asset('path_to_user_images/' . $review->user->profile_image) }}" alt="User Image" width="40" height="auto" style="border-radius: 50%;">
                                                <div style="display: inline-block; vertical-align: top;">{{ $review->user->name }}</div>
                                            </td>
                                            <td>
                                                <div class="rating text-warning">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <i class="{{ $i <= $review->rating ? 'fas' : 'far' }} fa-star"></i>
                                                    @endfor
                                                </div>
                                                <p>{{ $review->comment }}</p>
                                            </td>
                                            <td>{{ $review->created_at->format('d/m/Y') }}</td>
                                            <td><span class="badge bg-warning">Pending</span></td>
                                            <td>
                                                <a href="{{ route('reviews.publish', $review->id) }}" class="btn btn-success btn-sm">Publish</a>
                                                <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('')">
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
    </div>
</main>

@endsection
