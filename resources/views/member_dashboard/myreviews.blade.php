@extends('layouts.user_sidebar')

@section('dashboard-content')
<style>
.custom-select {
    border: 1px solid #ced4da; 
    border-radius: 5px; 
    padding: 4px 13px; 
    background-color: #ffffff; 
    font-size: 14px; 
    width: 150px;
    color: #495057; 
    transition: border-color 0.2s ease-in-out;
}

.custom-select:focus {
    border-color: #80bdff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.25); 
    outline: none; 
}

.custom-select option {
    color: #495057; 
}




</style>

<h4 class="py-2 px-2">My Reviews</h4>
<div class="d-flex justify-content-between align-items-center mt-4">
    <div class="button-tabs">
        <button class="tab-button mb-1 active" data-target="to-be-reviewed">To be Reviewed (5)</button>
        <button class="tab-button mb-1" data-target="history">History (5)</button>
    </div>
</div>

<!-- to be reviewed Tab -->
<div id="to-be-reviewed" class="tab-content active">
    <div class="order-items mt-3">
        <div class="order-items-list px-3">
            <div class="order-item d-flex align-items-center justify-content-between" style="padding: 10px; border-bottom: 1px solid #eaeaea;">
                <div style="display: flex; align-items: center;">
                    <div style="margin-right: 15px;">
                        <a href="#"><img src="\assets\images\d (1).png" alt="Product Image" width="70" height="auto"></a>
                    </div>
                    <div style="line-height: 1.5;">
                        <span style="font-weight: 600; font-size: 15px;">Sara Off Red Strape Dress </span><br>
                        <div>
                            <span class="me-2">Color: <span style="font-weight: 600;">Yellow</span></span> | 
                            <span class="me-2 ms-2">Size: <span style="font-weight: 600;">M</span></span> |
                            <span class="ms-2">Qty: <span style="font-weight: 600;">1</span></span>
                        </div>
                        <h6 class="mt-2" style="font-weight: bold;">Rs 3400</h6>  
                    </div>
                </div>
                <div class="ml-auto" style="text-align: right;">
                    <a href="" class="btn-review">Review</a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- History Tab -->
<div id="history" class="tab-content">
    <div class="order-items mt-3">
        <div class="order-items-list px-3">
            <div class="order-item row" style="padding: 10px; border-bottom: 1px solid #eaeaea;">
                <div class="col-md-1 d-flex align-items-center">
                    <div style="margin-right: 15px;">
                        <a href="#"><img src="\assets\images\d (1).png" alt="Product Image" width="70" height="auto"></a>
                    </div>
                </div>

                <div class="col-md-3 d-flex flex-column justify-content-center border-end" style="border-right: 1px solid #eaeaea; font-size: 13px;">
                    <span style="font-weight: 600;">Sara Off Red Strape Dress</span>
                    <div>
                        <span class="me-2">Color: <span style="font-weight: 600;">Yellow</span></span> | 
                        <span class="me-2 ms-2">Size: <span style="font-weight: 600;">M</span></span> |
                        <span class="ms-2">Qty: <span style="font-weight: 600;">1</span></span>
                    </div>
                    <h6 class="mt-2" style="font-size: 13px;font-weight: bold;">Rs 3400</h6>  
                </div>

                <div class="col-md-5 d-flex flex-column align-items-start border-end" style="border-right: 1px solid #eaeaea;">
                    <p class="m-0" style="font-weight: 500;">Feedback I left:</p>
                    <div class="rating text-warning mb-1" style="font-size: 20px;">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="review-description text-start">
                        <p style="font-size: 13px;">Great quality product!</p>
                    </div>
                </div>

                <div class="col-md-3 d-flex align-items-start justify-content-start">
                    <span class="">Feedback is published</span>
                </div>
            </div>
        </div>
    </div>
</div>






<!-- cancel Confirmation Modal -->
<div class="modal fade" id="cancel-confirmation-modal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirm Cancellation</h5>
            </div>
            <div class="modal-body">
                Are you sure you want to cancel this order?
            </div>
            <div class="modal-footer">
                <button type="button" id="confirm-cancel" class="btn btn-success" style="font-size: 13px">Confirm</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" style="font-size: 13px">Cancel</button>
            </div>
        </div>
    </div>
</div>


<!-- Confirm Delivery Modal -->
<div class="modal fade" id="confirmDeliveryModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeliveryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeliveryModalLabel">Confirm Delivery</h5>
            </div>
            <div class="modal-body" id="confirmDeliveryMessage">
                Are you sure you want to confirm delivery for this order?
            </div>
            <div class="modal-footer">
                <button type="button" id="confirmDeliveryBtn" class="btn btn-success" style="font-size: 13px">Confirm</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" style="font-size: 13px">Cancel</button>
            </div>
        </div>
    </div>
</div>





<script>
    document.querySelectorAll('.tab-button').forEach(button => {
        button.addEventListener('click', function() {
            document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
            document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));

            this.classList.add('active');
            document.getElementById(this.getAttribute('data-target')).classList.add('active');
        });
    });
</script>


@endsection
