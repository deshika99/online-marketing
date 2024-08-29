@extends('layouts.admin_main.master')

@section('content')

<style>

</style>

<main style="margin-top: 50px">
    <div class="container py-5 px-4">
        <h3>Customer Inquiries</h3>
        <div class="card">
            <div class="card-body">
            <div class="container">
            <div class="table-responsive">
                <div class="d-flex mb-4 col-md-3" style="font-size:15px;">
                    <label for="dateFilter" class="form-label col-md-4 mt-2">Select Date:</label>
                    <input type="date" id="dateFilter" class="form-control col-md-3" placeholder="Select date"  style="font-size:15px;">
                </div>

                <table id="example" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Inquiry Type</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Jane Doe</td>
                            <td>12345</td>
                            <th>2024-08-31</th>
                            <td>Refund Request</td>
                            <td>In Progress</td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#inquiryDetailsModal"> 
                                    <i class="fas fa-file"></i></a>
                                <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-success btn-sm">Resolve</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="inquiryDetailsModal" tabindex="-1" aria-labelledby="inquiryDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-2">
            <div class="modal-header">
                <h5 class="modal-title" id="inquiryDetailsModalLabel">Inquiry Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Customer:</strong> Jane Doe</p>
                <p><strong>Order ID:</strong> 12345</p>
                <p><strong>Inquiry Type:</strong> Refund Request</p>
                <p><strong>Status:</strong> In Progress</p>
                <p><strong>Message:</strong> I would like to request a refund for my recent order.</p>
                <form>
                    <div class="mb-3">
                        <label for="responseMessage" class="form-label">Response</label>
                        <textarea class="form-control" id="responseMessage" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Response</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const dateFilter = document.getElementById('dateFilter');
    const table = document.getElementById('example').getElementsByTagName('tbody')[0];
    
    dateFilter.addEventListener('change', function() {
        const selectedDate = dateFilter.value;
        
        if (selectedDate) {
            for (let row of table.rows) {
                const dateCell = row.cells[3].innerText; 
                if (dateCell === selectedDate) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        } else {
            for (let row of table.rows) {
                row.style.display = '';
            }
        }
    });
});
</script>


@endsection
