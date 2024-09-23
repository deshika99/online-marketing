@extends('layouts.affiliate_main.master')

@section('content')
<style>
    .table thead {
        background-color: #9FC5E8;
    }
    
  /* General Reset */
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Arial', sans-serif;
    }

    body {
        background-color: #f4f4f4;
    }

/* Container */
    .tool-container {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        justify-content: space-between;
    }


/* Main Content */
   .tool-content {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-grow: 1;
        padding: 20px;
    }

    .tool-form-container {
        background-color: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        width: 100%;
    }

    .tool-form-container h2 {
        font-size: 22px;
        margin-bottom: 20px;
        text-align: center;
    }

    .tool-form {
        display: flex;
        flex-direction: column;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-size: 16px;
        margin-bottom: 5px;
        color: #333;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
        transition: border-color 0.3s ease;
    }

    .form-group input:focus {
        border-color: #f39c12;
    }

    button#generate-btn {
      padding: 10px 15px;
      font-size: 16px;
      color: white;
      background-color: #0056b3;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    button#generate-btn:hover {
      background-color:#0056b3;
    }

/* Generated Link Section */
    .generated-link {
      margin-top: 30px;
    }

    .generated-link h3 {
      font-size: 18px;
      margin-bottom: 10px;
      color: #333;
    }

    .generated-link p {
      font-size: 16px;
      background-color: #f9f9f9;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      color: #555;
      word-wrap: break-word;
    }
</style>

<main style="margin-top: 58px">
    <div class="container pt-4 px-4">
        <h2 class="py-3">Tools</h2>
    </div>

    <!-- Main Content: Tool Form -->
    <section class="tool-content">
      <div class="tool-form-container">
        <h2>Generate Your Affiliate Link</h2>
        <form class="tool-form">
          <!-- Product URL Input -->
          <div class="form-group">
            <label for="product-link">Enter Product URL:</label>
            <input type="url" id="product-link" placeholder="https://example.com/product" required>
          </div>

          <!-- Affiliate ID Input -->
          <div class="form-group">
            <label for="affiliate-id">Affiliate ID:</label>
            <input type="text" id="affiliate-id" placeholder="Your Affiliate ID" required>
          </div>

          <!-- Generate Button -->
          <div style="display: flex; justify-content: center;">
            <button type="button" id="toggleSelectAll2" class="btn btn-secondary btn-sm" style="font-size: 0.9rem; width: 100%;">
              Generate Affiliate Link
            </button>
          </div> 
        </form>

        <!-- Output Section -->
        <div class="generated-link">
          <h3>Your Affiliate Link:</h3>
          <p id="output-link">No link generated yet.</p>
        </div>
      </div>
    </section> 
</main>


