@extends('layouts.user_sidebar')

@section('dashboard-content')
<style>
    h4.py-2.px-2 {
        margin-bottom: 20px; /* Adjust the value to increase or decrease the space */
    }

    .dashboard-header {
        display: flex;
        align-items: center;
        padding: 10px;
        border-bottom: 1px solid #e0e0e0;
    }

    .profile-info {
        margin-left: 20px;
    }

    .profile-info h4 {
        margin: 0;
        font-size: 18px;
        font-weight: bold;
    }

    .profile-info p {
        margin: 0;
        font-size: 14px;
        color: #888;
    }

    .orders-section {
        margin-top: 30px;
        padding: 20px;
        border-bottom: 1px solid #e0e0e0;
        margin-bottom: 20px;
    }

    .orders-row {
        display: flex;
        justify-content: space-around; /* Adjusts space evenly between items */
        padding: 10px 0;
    }

    .orders-box {
        display: flex;
        flex-direction: column; /* Stack image and text vertically */
        align-items: center; /* Center align items */
        justify-content: center;
        text-align: center;
        width: 100px;
        padding: 10px;
    }

    .orders-box img {
        width: 40px;
        height: 40px;
        margin-bottom: 5px; /* Space between image and text */
    }

    .orders-box p {
        margin: 0; /* Reset margin for better alignment */
        font-size: 12px;
        white-space: nowrap;
    }

    .faq-section {
    width: 80%;
    max-width: 800px;
    margin: 0 auto;
}


.faq-item {
    margin-bottom: 10px;
}

.faq-question {
    width: 100%;
    padding: 15px;
    font-size: 16px;
    text-align: left;
    background-color:white;
    border: none;
    outline: none;
    cursor: pointer;
    transition: background-color 0.3s;
}

.faq-question:hover {
    background-color: #ddd;
}

.faq-answer {
    display: none;
    padding: 15px;
    border: 1px solid #ddd;
    border-top: none;
    background-color: #f9f9f9;
}

.faq-answer p {
    margin: 0;
}
</style>

<!-- Dashboard Header -->


<div class="dashboard-header">
    @if(isset($user))
        <img src="{{ $user->profile_image_url }}" alt="Profile Picture" style="width: 80px; height: auto; border-radius: 50%; object-fit: cover; margin-right: 20px;">

        <span style="font-size: 22px; font-weight: bold;">{{ $user->name }}</span>
    @else
        <p>No user details available.</p>
    @endif
</div>


<!-- My Orders Section -->
<div class="orders-section">
    <h5>My Orders</h5>
    <div class="orders-row">
        <div class="orders-box">
            <img src="https://icons.veryicon.com/png/128/miscellaneous/bigmk_app_icon/unpaid-2.png" alt="Unpaid">
            <p>Unpaid</p>
        </div>
        <div class="orders-box">
            <img src="https://icons.veryicon.com/png/128/miscellaneous/cb/to-be-shipped-25.png" alt="To be shipped">
            <p>To be shipped</p>
        </div>
        <div class="orders-box">
            <img src="https://icons.veryicon.com/png/128/miscellaneous/bigmk_app_icon/in-transit.png" alt="Shipped">
            <p>Shipped</p>
        </div>
        <div class="orders-box">
            <img src="https://icons.veryicon.com/png/128/miscellaneous/document-format/reviewed-5.png" alt="To be reviewed">
            <p>To be reviewed</p>
        </div>
    </div>
</div>

<!--
<div class="faq-section">
    <h2 style="text-align:center; margin-bottom: 20px;">FAQs</h2>
    <div class="faq-item">
        <button class="faq-question">How do I join?</button>
        <div class="faq-answer">
            <p>You can join by signing up on our website.</p>
        </div>
    </div>
    <div class="faq-item">
        <button class="faq-question">What can I get if I join in?</button>
        <div class="faq-answer">
            <p>As a member, you will receive special offers and discounts.</p>
        </div>
    </div>
    <div class="faq-item">
        <button class="faq-question">How can I find out my level?</button>
        <div class="faq-answer">
            <p>Your level will be displayed on your profile page.</p>
        </div>
    </div>
</div>-->

<script>
    document.addEventListener('DOMContentLoaded', function () {
    var faqQuestions = document.querySelectorAll('.faq-question');

    faqQuestions.forEach(function (question) {
        question.addEventListener('click', function () {
            var answer = this.nextElementSibling;

            // Hide all other answers
            var allAnswers = document.querySelectorAll('.faq-answer');
            allAnswers.forEach(function (item) {
                if (item !== answer) {
                    item.style.display = 'none';
                }
            });

            // Toggle the answer of the clicked question
            if (answer.style.display === 'block') {
                answer.style.display = 'none';
            } else {
                answer.style.display = 'block';
            }
        });
    });
});

</script>

@endsection

