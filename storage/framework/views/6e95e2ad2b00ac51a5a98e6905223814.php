 

<?php $__env->startSection('content'); ?>

<style>
    /* Main Section Styles */
    .contact-main {
        text-align: center;
        padding: 50px 0;
        background-image: url('/assets/images/contact1.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        color: white;
        height: 200px;
    }
    .contact-main h1 {
        font-size: 50px;
        color: white;
        margin-bottom: 10px;
    }
    
    .contact-section {
        text-align: center;
        padding: 50px 0;
        background-color: #fff;
    }

    .contact-section h2 {
        font-size: 2.5rem;
        margin-bottom: 40px;
        color: #333;
    }

    .contact-container {
        display: flex;
        justify-content: center;
        gap: 30px;
        margin-top: 20px;
        flex-wrap: wrap; /* Screen size smaller, items stack in multiple rows */
    }

    .contact-item {
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        padding: 20px;
        width: 250px;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: transform 0.3s ease;
    }
    
    .contact-item:hover {
        transform: translateY(-10px);
        background-color: hsl(240, 3%, 7%);
    }
    .contact-item:hover i,
    .contact-item:hover h3,
    .contact-item:hover p {
        color: white;
    }

    .contact-item i {
        font-size: 2rem;
        color: #2c3e50;
        margin-bottom: 10px;
    }
    
    .contact-item h3 {
        font-size: 1.2rem;
        margin-bottom: 5px;
        color: #333;
    }

    .contact-item p {
        font-size: 0.8rem;
        color: #666;
    }

    @media (max-width: 480px) {
    .contact-section h2 {
        font-size: 2rem;
    }

    .contact-item i {
        font-size: 1.5rem;
    }

    .contact-item h3 {
        font-size: 1rem;
    }

    .contact-item p {
        font-size: 0.7rem;
    }
}


    /* Contact Form Styles */
    .contact-form {
        max-width: 600px;
        margin: 40px auto;
        background-color: #f9f9f9;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    
    .contact-form h3 {
        font-size: 1.5rem;
        margin-bottom: 20px;
        color: #333;
    }
    
    .contact-form .form-group {
        margin-bottom: 15px;
    }
    
    .contact-form input,
    .contact-form textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1rem;
    }
    
    .contact-form button {
        background-color: #f5b942;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1rem;
    }
    
    .contact-form button:hover {
        background-color: #2c3e50;
        color: #fff;
    }

</style>

 <!-- Contact-main Section -->
 <div class="contact-main">
    <h1>Contact Us</h1>
</div>

<!-- Contact Details Section -->
<div class="contact-section">
    <h2>Let's Get In Touch</h2>
    <div class="contact-container">
        <div class="contact-item">
            <i class="fas fa-map-marker-alt"></i>
            <h3>Location</h3>
            <p>No 425/2, Parakum Place, Kaduruwela, Polannaruwa.</p>
        </div>
        <div class="contact-item">
            <i class="fas fa-envelope"></i>
            <h3>Email Address</h3>
            <p>omarketingcomplex@gmail.com</p>
        </div>
        <div class="contact-item">
            <i class="fas fa-phone-alt"></i>
            <h3>Phone</h3>
            <p>075 833 7141</p>
        </div>
    </div>
</div>

<!-- Contact Form Section -->
<div class="contact-form">
    <h3>Send Us a Message</h3>
    <form action="<?php echo e(route('contact.submit')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <input type="text" name="name" placeholder="Your Name" required>
        </div>
        <div class="form-group">
            <input type="email" name="email" placeholder="Your Email" required>
        </div>
        <div class="form-group">
            <input type="text" name="contactnumber" placeholder="Your Contact Number" required>
        </div>
        <div class="form-group">
            <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
        </div>
        <button type="submit">Send Message</button>
    </form>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\chint\OneDrive\Documents\GitHub\online-marketing\resources\views/contac.blade.php ENDPATH**/ ?>