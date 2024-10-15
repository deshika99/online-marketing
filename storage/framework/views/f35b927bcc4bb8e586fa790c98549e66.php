
    <style>
        /* Style for the popup background */
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        /* Style for the popup content (Increased width) */
        .popup-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 90%; /* Increase width to 90% */
            max-width: 1200px; /* Increase the max width */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .popup-content h2 {
            margin-top: 0;
            text-align: center;
        }

        .form-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .form-container input {
            width: 95%;
            padding: 10px;
            border-radius: 25px;
            border: 1px solid #ccc;
            outline: none;
        }

        .form-container div {
            width: 48%;
        }

        .form-container .full-width {
            width: 100%;
        }

        /* Close button */
        .close-popup {
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 25px;
            color: #333;
        }

        /* Button styles */
        .form-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .form-buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .save-btn {
            background-color: #4CAF50;
            color: white;
        }

        .edit-btn {
            background-color: #f0ad4e;
            color: white;
        }

        .delete-btn {
            background-color: #d9534f;
            color: white;
        }

        .open-popup-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 20px;
        }
    </style>
</head>
<body>


<!-- Popup container -->
<div class="popup" id="popup">
    <div class="popup-content">
        <span class="close-popup" onclick="closePopup()">&times;</span>
        <h2>Form</h2>
        <form>
            <div class="form-container">
                <div><input type="text" placeholder="First name"></div>
                <div><input type="text" placeholder="Last name"></div>
                <div><input type="text" placeholder="Phone"></div>
                <div><input type="text" placeholder="Email"></div>
                <div class="full-width"><input type="text" placeholder="Company Name (Optional)"></div>
                <div class="full-width"><input type="text" placeholder="Street Address"></div>
                <div class="full-width"><input type="text" placeholder="Apartment, Suite, unit etc. (Optional)"></div>
                <div><input type="text" placeholder="City"></div>
                <div><input type="text" placeholder="Postal code"></div>
            </div>
            <!-- Form action buttons -->
            <div class="form-buttons">
                <button type="button" class="edit-btn" onclick="editForm()">Edit</button>
                <button type="button" class="delete-btn" onclick="deleteForm()">Delete</button>
                <button type="submit" class="save-btn">Save</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Function to open the popup
    function openPopup() {
        document.getElementById("popup").style.display = "flex";
    }

    // Function to close the popup
    function closePopup() {
        document.getElementById("popup").style.display = "none";
    }

    // Example functions for Edit and Delete
    function editForm() {
        alert("Edit action triggered!");
        // Add logic to enable editing of the form fields if needed
    }

    function deleteForm() {
        if (confirm("Are you sure you want to delete this form?")) {
            // Add logic to delete/reset the form data
            alert("Form deleted!");
            document.querySelector("form").reset(); // Reset form fields
        }
    }
</script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\online-marketing\resources\views/member_dashboard/add_address.blade.php ENDPATH**/ ?>