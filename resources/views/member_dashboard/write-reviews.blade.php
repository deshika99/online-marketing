@extends('layouts.user_sidebar')

@section('dashboard-content')
<style>
    /* Title and Content in a Single Box */
    .review-header {
        margin-bottom: 20px;
        padding: 10px 0;
        text-align:left;
        border-bottom: 1px solid #ddd;
    }

    .review-product {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
    }

    .review-product-info {
        flex-grow: 1;
    }

    .review-rating-container h6 {
        font-weight: bold;
    }

    .review-rating-container {
        display: flex;
        align-items: center;
        gap: 60px; /* Gap between text and stars */
    }

    .review-rating {
        display: flex;
        align-items: center;
        gap: 5px;
        margin-bottom: 15px;
    }

    .review-rating i {
        font-size: 1.5rem;
        color: #ccc; /* Default unfilled star color */
        cursor: pointer; /* Clickable stars */
    }

    .review-rating i.filled {
        color: #FFD700; /* Gold filled star color */
    }

    .review-textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        resize: none;
        margin-bottom: 20px;
    }

    .review-upload {
        display: flex;
        gap: 15px;
        margin-bottom: 15px;
        flex-wrap: wrap; /* Allow wrapping of images/videos */
    }

    .review-upload div {
        flex: 1;
        text-align: center;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        cursor: pointer;
        position: relative;
    }

    .review-upload input[type="file"] {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        opacity: 0; /* Invisible but clickable */
        cursor: pointer;
    }

    .uploaded-item {
        display: flex;
        align-items: center;
        margin-top: 10px;
    }

    .uploaded-item img,
    .uploaded-item video {
        max-width: 100px;
        max-height: 100px;
        margin-right: 10px;
    }

    .remove-item {
        color: red;
        cursor: pointer;
        margin-left: 5px;
    }

    .review-checkbox {
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .review-submit {
        width: 100%;
        padding: 15px;
        background: linear-gradient(to right, hsl(226, 93%, 27%), hsl(226, 91%, 58%));
        border: none;
        border-radius: 5px;
        color: #fff;
        font-size: 1rem;
        cursor: pointer;
    }

    .review-submit:hover {
        background: linear-gradient(to right,hsl(226, 93%, 27%), hsl(226, 91%, 58%));
    }
</style>

<div class="review-container">
    <!-- Combined Title and Container -->
    <div class="review-header">
        <h4>Write Reviews</h4>
    </div>

    <div class="review-product">
        <div class="col-md-1 d-flex align-items-center">
            <div style="margin-right: 15px;">
                <a href="#"><img src="\assets\images\d (1).png" alt="Product Image" width="70" height="auto"></a>
            </div>
        </div>

        <div class="col-md-3 d-flex flex-column justify-content-center" style="font-size: 13px;">
            <span style="font-weight: 600;">Sara Off Red Strape Dress</span>
            <div>
                <span class="me-2">Color: <span style="font-weight: 600;">Yellow</span></span> | 
                <span class="me-2 ms-2">Size: <span style="font-weight: 600;">M</span></span> |
                <span class="ms-2">Qty: <span style="font-weight: 600;">1</span></span>
            </div>
            <h6 class="mt-2" style="font-size: 13px;font-weight: bold;">Rs 3400</h6>  
        </div>
    </div>

    <div class="review-rating-container">
        <h6>Overall Rating</h6>
        <div class="review-rating">
            <i class="far fa-star" data-value="1"></i>
            <i class="far fa-star" data-value="2"></i>
            <i class="far fa-star" data-value="3"></i>
            <i class="far fa-star" data-value="4"></i>
            <i class="far fa-star" data-value="5"></i>
        </div>
    </div>

    <textarea class="review-textarea" rows="5" placeholder="Please tell us what needs to be improved."></textarea>

    <div class="review-upload">
        <div>
            <i class="fas fa-camera"></i>
            <p>Upload Photo</p>
            <input type="file" accept="image/*" multiple style="display:none;" id="upload-photo">
        </div>
        <div>
            <i class="fas fa-video"></i>
            <p>Upload Video</p>
            <input type="file" accept="video/*" style="display:none;" id="upload-video">
        </div>
    </div>

    <div id="uploaded-photos"></div>
    <div id="uploaded-videos"></div>

    <div class="review-checkbox">
        <input type="checkbox" id="anonymous">
        <label for="anonymous">Anonymously</label>
    </div>

    <button type="submit" class="review-submit">Submit</button>
</div>

<script>
document.querySelectorAll('.review-rating i').forEach((star) => {
    star.addEventListener('click', function() {
        const ratingValue = this.getAttribute('data-value'); // Get clicked star's value
        
        // Highlight the clicked star and all previous stars
        document.querySelectorAll('.review-rating i').forEach((s, index) => {
            if (index < ratingValue) {
                s.classList.remove('far'); // Remove unfilled class
                s.classList.add('fas', 'filled'); // Add filled star class (solid stars)
            } else {
                s.classList.remove('fas', 'filled'); // Remove solid filled class
                s.classList.add('far');      // Add unfilled star class back
            }
        });
    });
});

// Photo upload functionality
document.querySelector('#upload-photo').parentElement.addEventListener('click', function() {
    document.querySelector('#upload-photo').click(); // Trigger image upload
});

document.querySelector('#upload-photo').addEventListener('change', function(event) {
    const files = event.target.files;
    const photoContainer = document.getElementById('uploaded-photos');
    photoContainer.innerHTML = ''; // Clear previous uploads

    Array.from(files).forEach(file => {
        const reader = new FileReader();
        reader.onload = function(e) {
            const uploadedItem = document.createElement('div');
            uploadedItem.className = 'uploaded-item';
            uploadedItem.innerHTML = `
                <img src="${e.target.result}" alt="Uploaded Photo">
                <span class="remove-item" onclick="removeItem(this)">Remove</span>
            `;
            photoContainer.appendChild(uploadedItem);
        }
        reader.readAsDataURL(file);
    });
});

// Video upload functionality
document.querySelector('#upload-video').parentElement.addEventListener('click', function() {
    document.querySelector('#upload-video').click(); // Trigger video upload
});

document.querySelector('#upload-video').addEventListener('change', function(event) {
    const files = event.target.files;
    const videoContainer = document.getElementById('uploaded-videos');
    videoContainer.innerHTML = ''; // Clear previous uploads

    if (files.length > 1) {
        alert("You can only upload one video at a time.");
        event.target.value = ''; // Reset the input field
    } else {
        const reader = new FileReader();
        reader.onload = function(e) {
            const uploadedItem = document.createElement('div');
            uploadedItem.className = 'uploaded-item';
            uploadedItem.innerHTML = `
                <video controls src="${e.target.result}"></video>
                <span class="remove-item" onclick="removeItem(this)">Remove</span>
            `;
            videoContainer.appendChild(uploadedItem);
        }
        reader.readAsDataURL(files[0]);
    }
});

// Remove uploaded item
function removeItem(element) {
    element.parentElement.remove(); // Remove the uploaded item from the DOM
}
</script>

@endsection
