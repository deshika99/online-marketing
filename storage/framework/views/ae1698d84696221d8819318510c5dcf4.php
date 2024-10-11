<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>OMC</title>
    <title><?php echo e(config('app.name', 'OMC')); ?></title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    


    <?php echo $__env->make('includes.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

   
<style>
    .dropdown-toggle::after {
        display: none; 
    }
</style>
</head>
<body>
    <div id="app">
        
    <?php if(!Request::is('/') && !Request::is('home/affiliate/register') && !Request::is('home/affiliate/affiliate_home')): ?>
    <?php echo $__env->make('includes.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>




        <main class="mb-5">
            <?php echo $__env->yieldContent('content'); ?>
            
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
            
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            console.log("Fetching cart count from: <?php echo e(route('cart.count')); ?>");
            $.get("<?php echo e(route('cart.count')); ?>", function(data) {
                $('#cart-count').text(data.cart_count);
            });
            $(document).ready(function() {
                console.log("jQuery is working!");
            });

        });
    </script>


 
    <?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\online-marketing\resources\views/layouts/app.blade.php ENDPATH**/ ?>