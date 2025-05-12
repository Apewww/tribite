<style>
    body {
        background-color: white;
        margin: 0px;
    }
</style>

<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-pink position-fixed h-100">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white h-100">
        <!-- Logo -->
        <a href="/dashboard" class="d-flex align-content-center align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <img src="/tribite/assets/img/Logo.png" alt="Landing Logo" class="img-fluid" style="max-width: 50px;"><span class="fs-5 d-none d-sm-inline text-red">Tribite AdminPanel</span>
        </a>

        <!-- Navigation -->
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start w-100" id="menu">
            <li class="nav-item w-100">
                <a href="/home" class="nav-link px-md-2 text-black link-danger">
                    <i class="fa fa-home"></i> <span class="ms-2 d-none d-sm-inline">Home</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a href="/dashboard" class="nav-link px-md-2 text-black link-danger <?php echo ($_SERVER['REQUEST_URI'] == '/dashboard') ? 'active' : ''; ?>">
                    <i class="fa fa-tachometer"></i> <span class="ms-2 d-none d-sm-inline">Dashboard</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a href="/katalogmanage" class="nav-link px-md-2 text-black link-danger <?php echo ($_SERVER['REQUEST_URI'] == '/katalogmanage') ? 'active' : ''; ?>">
                    <i class="fa fa-table"></i> <span class="ms-2 d-none d-sm-inline">Katalog</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a href="/akun" class="nav-link px-md-2 text-black link-danger <?php echo ($_SERVER['REQUEST_URI'] == '/akun') ? 'active' : ''; ?>">
                    <i class="fa fa-address-card-o"></i> <span class="ms-2 d-none d-sm-inline">Akun</span>
                </a>
            </li>
        </ul>

        <!-- User Profile at bottom -->
        <div class="dropdown pb-4 mt-auto w-100">
            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle text-black" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="/tribite/assets/img/aaaa.jpg" alt="profile" width="30" height="30" class="rounded-circle">
                <span class="d-none d-sm-inline ms-2">Christy Chriselle</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="/profile">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/login">Keluar</a></li>
            </ul>
        </div>
    </div>
</div>