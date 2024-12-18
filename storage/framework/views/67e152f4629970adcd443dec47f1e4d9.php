  <!-- Start Top Header Area -->
  <div class="top-header">
      <div class="container">
          <div class="row align-items-center justify-content-center">
              <div class="col-lg-6 col-md-12">
                  <ul class="header-contact-info">
                      <li>Welcome to Omc</li>
                      <li>Call: <a href="tel:075 833 7141">075 833 7141</a></li>
                  </ul>
              </div>

              <div class="col-lg-6 col-md-12">
                  <ul class="header-top-menu">
                      <li><a href="#" data-bs-toggle="modal" data-bs-target="#shoppingWishlistModal"><i class='bx bx-heart'></i> Wishlist</a></li>
                      <li><a href="/compare"><i class='bx bx-shuffle'></i> Compare</a></li>
                      <?php if(auth()->guard()->check()): ?>
                      <li><a href="#"><i class='bx bxs-user'></i> My Account</a></li>
                      <?php else: ?>
                      <li><a href="/login"><i class='bx bx-log-in'></i> Login</a></li>
                      <?php endif; ?>



                      <ul class="header-top-others-option">
                          <div class="option-item">
                              <div class="search-btn-box">
                                  <i class="search-btn bx bx-search-alt"></i>
                              </div>
                          </div>

                          <div class="option-item">
                              <div class="cart-btn">
                                  <a href="#" data-bs-toggle="modal" data-bs-target="#shoppingCartModal"><i class='bx bx-shopping-bag'></i><span>0</span></a>
                              </div>
                          </div>
                      </ul>
              </div>
          </div>
      </div>
  </div>
  <!-- End Top Header Area -->

  <!-- Start Navbar Area -->
  <div class="navbar-area">
      <div class="xton-responsive-nav">
          <div class="container">
              <div class="xton-responsive-menu">
                  <div class="logo">
                      <a href="index.html">
                          <img src="frontend/assets/img/logo.png" height="50" width="35" class="main-logo" alt="logo"> <span> <img src="frontend/assets/img/brand_name.png" height="20" width="285" alt="brand" /></span>
                          <img src="frontend/assets/img/white-logo.png" class="white-logo" alt="logo">
                      </a>
                  </div>
              </div>
          </div>
      </div>

      <div class="xton-nav">
          <div class="container">
              <nav class="navbar navbar-expand-md navbar-light">
                  <a class="navbar-brand" href="index.html">
                      <img src="frontend/assets/img/logo.png" height="50" width="35" class="main-logo" alt="logo"><span> <img src="frontend/assets/img/brand_name.png" height="20" width="285" alt="brand" /></span>
                      <img src="frontend/assets/img/white-logo.png" class="white-logo" alt="logo">
                  </a>

                  <div class="collapse navbar-collapse mean-menu">
                      <ul class="navbar-nav">
                          <li class="nav-item"><a href="/home" class="nav-link ">Home </a>
                          </li>

                          <li class="nav-item"><a href="/About-us" class="nav-link ">About us </a>
                          </li>

                          <li class="nav-item"><a href="/all-items" class="nav-link">All items </a>
                          </li>

                          <li class="nav-item "><a href="/special-offers" class="nav-link">Special offers </a>
                          </li>

                          <li class="nav-item "><a href="/best-seller" class="nav-link">Best sellers </a>

                          </li>

                          <li class="nav-item"><a href="/contact" class="nav-link">Contact us </a>
                          </li>
                      </ul>

                      <div class="others-option">
                          <div class="option-item">
                              <div class="search-btn-box">
                                  <i class="search-btn bx bx-search-alt"></i>
                              </div>
                          </div>

                          <div class="option-item">
                              <div class="cart-btn">
                                  <a href="#" data-bs-toggle="modal" data-bs-target="#shoppingCartModal"><i class='bx bx-shopping-bag'></i><span>3</span></a>
                              </div>
                          </div>

                          <div class="option-item">
                              <div class="burger-menu" data-bs-toggle="modal" data-bs-target="#sidebarModal">
                                  <span class="top-bar"></span>
                                  <span class="middle-bar"></span>
                                  <span class="bottom-bar"></span>
                              </div>
                          </div>
                      </div>
                  </div>
              </nav>
          </div>
      </div>
  </div>
  <!-- End Navbar Area -->


  <!-- Start Search Overlay -->
  <div class="search-overlay">
      <div class="d-table">
          <div class="d-table-cell">
              <div class="search-overlay-layer"></div>
              <div class="search-overlay-layer"></div>
              <div class="search-overlay-layer"></div>

              <div class="search-overlay-close">
                  <span class="search-overlay-close-line"></span>
                  <span class="search-overlay-close-line"></span>
              </div>

              <div class="search-overlay-form">
                  <form>
                      <input type="text" class="input-search" placeholder="Search here...">
                      <button type="submit"><i class='bx bx-search-alt'></i></button>
                  </form>
              </div>
          </div>
      </div>
  </div>

  <!-- End Search Overlay --><?php /**PATH C:\Users\chint\OneDrive\Documents\GitHub\online-marketing\resources\views/includes/navbar-new.blade.php ENDPATH**/ ?>