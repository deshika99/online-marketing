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
        width: 15%;
        padding: 10px;
        background: linear-gradient(to right, hsl(226, 93%, 27%), hsl(226, 91%, 58%));
        border: none;
        border-radius: 5px;
        color: #fff;
        font-size: 1rem;
        cursor: pointer;
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
                @if($product->images->isNotEmpty())
                    <a href="#"><img src="{{ asset('storage/' . $product->images->first()->image_path) }}" alt="Product Image" width="70" height="auto"></a>
                @endif
            </div>
        </div>

        <div class="col-md-3 d-flex flex-column justify-content-center" style="font-size: 13px;">
            <span style="font-weight: 600;">{{ $product->product_name }}</span>
            <div>
                <span class="me-2">Color: <span style="font-weight: 600;">{{ $color }}</span></span> | 
                <span class="me-2 ms-2">Size: <span style="font-weight: 600;">{{ $size }}</span></span> |
                <span class="ms-2">Qty: <span style="font-weight: 600;">{{ $quantity }}</span></span>
            </div>
            <h6 class="mt-2" style="font-size: 13px;font-weight: bold;">Rs {{ $cost }}</h6>  
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
        <div id="uploaded-photos" class="uploaded-container"></div>
    </div>
    <div>
        <i class="fas fa-video"></i>
        <p>Upload Video</p>
        <input type="file" accept="video/*" style="display:none;" id="upload-video">
        <div id="uploaded-videos" class="uploaded-container"></div>
    </div>
</div>


    
    

    <div class="review-checkbox">
        <input type="checkbox" id="anonymous">
        <label for="anonymous">Anonymously</label>
    </div>

    <button type="submit" class="review-submit">Submit</button>
</div>

<script>
// Review rating functionality
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
                s.classList.add('far'); // Add unfilled star class back
            }
        });
    });
});

// Photo upload functionality
const photoInput = document.querySelector('#upload-photo');
const photoPreviewContainer = document.querySelector('#uploaded-photos'); // Correctly referencing the preview container

photoInput.parentElement.addEventListener('click', function() {
    photoInput.click(); // Trigger image upload
});

photoInput.addEventListener('change', function(event) {
    const files = event.target.files;

    Array.from(files).forEach((file) => {
        const reader = new FileReader();

        reader.onload = function(e) {
            const imgWrapper = document.createElement('div');
            imgWrapper.style.position = 'relative';
            imgWrapper.style.width = '100px';
            imgWrapper.style.height = '100px';
            imgWrapper.style.display = 'inline-block'; // Ensure images are inline

            const img = document.createElement('img');
            img.src = e.target.result;
            img.style.width = '100%';
            img.style.height = '100%';
            img.style.objectFit = 'cover';
            imgWrapper.appendChild(img);

            // Add delete button
            const deleteBtn = document.createElement('button');
            deleteBtn.textContent = '×';
            deleteBtn.style.position = 'absolute';
            deleteBtn.style.top = '0';
            deleteBtn.style.right = '0';
            deleteBtn.style.backgroundColor = '#ff0000';
            deleteBtn.style.color = '#fff';
            deleteBtn.style.border = 'none';
            deleteBtn.style.borderRadius = '50%';
            deleteBtn.style.width = '20px';
            deleteBtn.style.height = '20px';
            deleteBtn.style.cursor = 'pointer';
            deleteBtn.style.padding = '0';

            // Add delete functionality
            deleteBtn.addEventListener('click', function() {
                imgWrapper.remove(); // This removes only the specific imgWrapper
            });

            imgWrapper.appendChild(deleteBtn);
            photoPreviewContainer.appendChild(imgWrapper);
        };

        reader.readAsDataURL(file);
    });

});

// Video upload functionality
const videoInput = document.querySelector('#upload-video');
const videoPreviewContainer = document.querySelector('#uploaded-videos'); // Correctly referencing the preview container

videoInput.parentElement.addEventListener('click', function() {
    videoInput.click(); // Trigger video upload
});

videoInput.addEventListener('change', function(event) {
    const files = event.target.files;

    // Clear previous video preview
    videoPreviewContainer.innerHTML = '';

    // Check the number of files
    if (files.length > 1) {
        alert("You can only upload one video at a time.");
        event.target.value = ''; // Reset the input field
        return; // Prevent further execution
    } else if (files.length === 1) {
        const reader = new FileReader();

        reader.onload = function(e) {
            const videoWrapper = document.createElement('div');
            videoWrapper.style.position = 'relative';
            videoWrapper.style.width = '200px';

            const video = document.createElement('video');
            video.src = e.target.result;
            video.controls = true;
            video.style.width = '100%';
            videoWrapper.appendChild(video);

            // Add delete button
            const deleteBtn = document.createElement('button');
            deleteBtn.textContent = '×';
            deleteBtn.style.position = 'absolute';
            deleteBtn.style.top = '0';
            deleteBtn.style.right = '0';
            deleteBtn.style.backgroundColor = '#ff0000';
            deleteBtn.style.color = '#fff';
            deleteBtn.style.border = 'none';
            deleteBtn.style.borderRadius = '50%';
            deleteBtn.style.width = '20px';
            deleteBtn.style.height = '20px';
            deleteBtn.style.cursor = 'pointer';
            deleteBtn.style.padding = '0';

            // Add delete functionality
            deleteBtn.addEventListener('click', function() {
                videoWrapper.remove(); // This removes only the specific videoWrapper
                videoInput.value = ''; // Reset video input
            });

            videoWrapper.appendChild(deleteBtn);
            videoPreviewContainer.appendChild(videoWrapper);
        };

        reader.readAsDataURL(files[0]); // Read the selected video file
    }
});



</script>

@endsection
