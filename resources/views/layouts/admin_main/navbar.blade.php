<header>
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top p-1">
        <!-- Container wrapper -->
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu"
                aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <div class="col-md-4 d-flex mb-md-0 px-3">
                <a href="" class="d-flex align-items-center" style="text-decoration: none">
                    <div class="navbar-brand me-0 p-0">
                        <img src="/assets/images/logo.png" height="52" width="35" alt="Logo" />
                    </div>
                    <img src="/assets/images/brand_name.png" height="25" width="280" alt="brand" />
                </a>
            </div>

            <ul class="navbar-nav ms-auto d-flex align-items-center flex-row">
                <li class="nav-item dropdown me-4">
                    <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#" id="notificationsDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <span class="badge rounded-pill badge-notification bg-danger">1</span>
                    </a>
                </li>
                <span class="me-2">|</span>
                <li class="nav-item dropdown me-2 d-flex align-items-center">
                    <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#"
                        id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="icon-circle">
                          @if(session('image_path'))
                              <img src="{{ asset(session('image_path')) }}" alt="Admin Image" class="rounded-circle" height="35" width="35">
                          @else
                              <i class="fas fa-user-alt"></i>
                          @endif
                        </div>
                        <span class="ms-2">{{ session('name', 'Admin') }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="{{ route('admin.profile') }}">My profile</a></li>
                        <li>
                            <form action="{{ route('admin.logout') }}" method="POST" class="m-0">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
        <!-- Container wrapper -->
    </nav>
</header>

