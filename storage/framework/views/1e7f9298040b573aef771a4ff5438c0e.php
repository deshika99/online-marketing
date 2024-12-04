<?php $__env->startSection('content'); ?>
<style>
    .deal-items {
    text-align: center;
    border-radius: 10px;
    position: relative;
}

.deal-items img {
    max-width: 90%;
    height: auto;
    margin-bottom: 10px;
    border: 0 solid #e1e1e1;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.deal-items .price {
    text-align: left;
    font-weight: bold;
    color:black;
    font-size: 15px;
    margin: 0 12px;
}

.deal-items p {
    font-size: 15px;
    color:black;
    text-align: left;
    margin: 0 12px;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

</style>  

<main style="margin-top: 58px">
    <div class="container pt-4 px-4"> 
        <h3 class="py-3">AD Center</h3>
        <ul class="nav nav-tabs mb-3" id="myTab0" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab0" data-bs-toggle="tab" data-bs-target="#hot_deals" type="button"
                    role="tab" aria-controls="hot_deals" aria-selected="true">
                    Hot Deals
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="commision-tab0" data-bs-toggle="tab" data-bs-target="#commision" type="button"
                    role="tab" aria-controls="commision" aria-selected="false">
                    Higher Commision
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="products-tab0" data-bs-toggle="tab" data-bs-target="#products" type="button"
                    role="tab" aria-controls="products" aria-selected="false">
                    Featured Products
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="products-tab0" data-bs-toggle="tab" data-bs-target="#products" type="button"
                    role="tab" aria-controls="products" aria-selected="false">
                    Search
                </button>
            </li>
        </ul>

        <div class="card">
            <div class="card-body">
                <div class="tab-content" id="myTabContent0">

                        <!-- Hot Deals -->
                        <div class="tab-pane fade show active" id="hot_deals" role="tabpanel" aria-labelledby="home-tab0">
                            <div class="row">

                                <div class="col-md-2 mb-3">
                                    <select id="categories" class="form-select" style="font-size: 0.8rem;">
                                        <option selected>Categories</option>
                                        <option value="1">Electronics</option>
                                        <option value="2">Fashion</option>
                                        <option value="3">Home</option>
                                    </select>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <select id="ship_from" class="form-select" style="font-size: 0.8rem;">
                                        <option selected>Ship From</option>
                                        <option value="1">United States</option>
                                        <option value="2">China</option>
                                        <option value="3">Germany</option>
                                    </select>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <select id="currency" class="form-select" style="font-size: 0.8rem;">
                                        <option selected>Currency</option>
                                        <option value="USD">USD</option>
                                        <option value="EUR">EUR</option>
                                        <option value="JPY">JPY</option>
                                    </select>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="free_shipping" style="transform: scale(0.8);">
                                        <label class="form-check-label" for="free_shipping" style="font-size: 0.8rem;">
                                            Free Shipping
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <div class="container mt-4 mb-4">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="deal-items">
                                            <a href="">
                                                <img src="/assets/images/toys1.jpg" alt="Product 1">
                                                <p>Electronic Toys Srilanka - Shop for best Electronic Toys online</p>
                                                <div class="price mb-2">Rs.35 699</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="deal-items">
                                            <a href="">
                                                <img src="/assets/images/toys2.jpg" alt="Product 2">
                                                <p>Electronic Toys Srilanka - Shop for best Electronic Toys online</p>
                                                <div class="price mb-2">Rs.32,199</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="deal-items">
                                            <a href="">
                                                <img src="/assets/images/toys3.png" alt="Product 3">
                                                <p>Electronic Toys Srilanka - Shop for best Electronic Toys online</p>
                                                <div class="price mb-2">Rs.15,000</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="deal-items">
                                            <a href="">
                                                <img src="/assets/images/toys4.jpg" alt="Product 4">
                                                <p>Electronic Toys Srilanka - Shop for best Electronic Toys online</p>
                                                <div class="price mb-2">Rs.6,000</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Commission -->
                        <div class="tab-pane fade" id="commision" role="tabpanel" aria-labelledby="commision-tab0">
                            Tab 2 content
                        </div>

                        <!-- Products -->
                        <div class="tab-pane fade" id="products" role="tabpanel" aria-labelledby="products-tab0">
                            Tab 3 content
                        </div>
                </div>
            </div>
        </div>



    </div>
</main>

<script>
$(document).ready(function() {
    var myTab = new mdb.Tab(document.getElementById('myTab0'));
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.affiliate_main.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\chint\OneDrive\Documents\GitHub\online-marketing\resources\views/affiliate_dashboard/ad_center.blade.php ENDPATH**/ ?>