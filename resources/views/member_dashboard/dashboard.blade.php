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
<h4 class="py-2 px-2">Dashboard</h4>
<div class="dashboard-header">
    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJQAAACUCAMAAABC4vDmAAAAM1BMVEX///+ZmZmVlZXZ2dmQkJDk5OS8vLzo6OjS0tK1tbXz8/P7+/v39/fs7OykpKTHx8eqqqq8lpdBAAAEZUlEQVR4nO1b2ZasIAyUiCLt+v9fe1unZ7pdoBJA23Mu9S4WIQkhS1FkZGRkZGRkZGRkZGRcgO7R98ZUVWVM/+i+zeYJ09R2GhS9oIbJ1o35Hp9HNQ5aP4lsQFrrYaweX6BU1QPpHaE/aBrq6lpG/ag8hP4kpsa+KNqLKFkFGb14KdtfQslMmsfoJa7pfLXv2FL6kNa5bqId98bGoEXjiYplpgBKM/R0mmo12OLctM4RVmfDKT1B9gRWlVTBd6xUcmdaxjH6QZmWUxMpph9Qcz9OaVk1Eh/uhU7GqklFSaWTVZlMTgurJNpesX71G3kykMAztAxGWtmxKctmtApLlVT0/dxCP/6MAj72XuEogmwsqRH9QttNvGQskhaNcZwM+AEdeWno/XVUzNCCWIXUYVhpwBHSFHM5o8MbHO+ox+D/LuYAO8CJnOG3QV+GWyCwPJ8fLMGnwRZo/LtVk+9jFDmHvnGQlnttqEe6Hsap97sDdALg7APdgvUuCuPIU7SqB5wUSKs80PchohqBMx/QAmf4KrRRKP4aXZtyThW69eBG0XWg5YEV2ieOa2FkX0s5oduLIylEynVzOlHBUC36+BRJzw+uiBUdx6xS+xsgqViXwFliA8azCmgEdL5P+5NxQmGwwubHeOprWajAeKiDmBZF0px9bQC9sUJvXc67mmSeipW18+lpi9VcMSz4E93EWdJn0tilzAtMklAd+vPXos4DBMHUL0Q+nWHOP3CwYicjJTEVeiEBVvwEqcQn8ElRvVOLrmYntNwPxwPA6/hj3WkjrBLfUO+PJVeygNTTL6vRvMTVmZGRobqC1JznGGw9jrUdhBUAESnG1bddnptcjCAlWZ82kHx6hvWRXmr+K8wdAdxyl4gUz3mSsmX/2MUKbdeXVvEkJnGejGuGyPqjBMugJbpm8IVM2/zrHgaHGqILGabLBlbdAPpRWZLDH+RRzUykgiy8MMjzhsOSUpQ3UheGw17vKSr5+CIG4cPB88SS5iU8mRLhE8v9kpQX7JwnSNLHqCs7oQNSXcnWcsQJ4s0tcHgGcYLD5dODKoiOOqY4FXTsqYSOJflih0ajA0sq3eFiAVJPKCiHqALWOXrjBtekD7RKh+zwIKYKrKfMOAg7guogu8s0pnS481WBxbVdwSim9JtssW3ai8I5Fe12rVBV2BYhI1Rqv8PgRsu1VoU7hBlrpxDRMLEubMf1OKw9TERhe20zcV1GqwAman/tdA6pqGaJlSWnIxXXVrJShWSkYhtwPh9JcT1i79RsfKvSR1MX1WUE3i5hSNAa+3HBb5M+ErxXSdIYe8dGwXStpwundI2eN2w+vWebbipWKeU0o4xtR5+RuPU7RZP8cMLE0R3HCYooIyTdnDWlEjyiQmeOGYUN86hTh3mKW449zZANiKkrBsRm8Efp9FWjdAst5tBhfR2lBfN4ppsXfWE8c8FrkFVtz5Loa4OsL9xt5PcPy3B0daPh6IyMjIyMjIyMjIyM/wD/AKrlLaHofErWAAAAAElFTkSuQmCC" alt="Profile Image" class="rounded-circle">
    <div class="profile-info">
        <h4>Kasuni Gayanthika</h4>
    </div>
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
    <div class="faq-item">
        <button class="faq-question">How do I level-up?</button>
        <div class="faq-answer">
            <p>You can level up by making more purchases and engaging with the platform.</p>
        </div>
    </div>
    <div class="faq-item">
        <button class="faq-question">What if I have more than one OMC account?</button>
        <div class="faq-answer">
            <p>Each account must be managed separately, and they cannot be merged.</p>
        </div>
    </div>
    <div class="faq-item">
        <button class="faq-question">What is my registration site?</button>
        <div class="faq-answer">
            <p>Your registration site is where you initially signed up for the service.</p>
        </div>
    </div>
    <div class="faq-item">
        <button class="faq-question">How can I track the status of my service orders?</button>
        <div class="faq-answer">
            <p>You can track the status of all your service orders through the member dashboard. From the dashboard, you’ll see real-time updates on your orders, including service progress, payment status, and expected completion dates.</p>
        </div>
    </div>
</div>

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
