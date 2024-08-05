@extends('layouts.sidebar')

@section('dashboard-content')
<h3 class="py-2 px-2">Order History</h3>
<ul class="list-group">
    <li class="list-group-item">Order #12345 - <a href="{{ route('order-details') }}">View Details</a></li>
</ul>
@endsection
