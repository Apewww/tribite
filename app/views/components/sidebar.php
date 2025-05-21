<style>
    body {
        background-color: white;
        margin: 0px;
    }
</style>

<nav class="navbar navbar-light bg-pink px-3">
    <button class="btn btn-outline-danger" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
        <i class="fa fa-bars"></i>
    </button>
    <span class="navbar-brand ms-2">
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle text-black" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="/tribite/assets/img/aaaa.png" alt="profile" width="30" height="30" class="rounded-circle">
                <span class="ms-2">Christy Chriselle</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="/profile">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/login">Keluar</a></li>
            </ul>
        </div>
    </span>
</nav>

<div class="offcanvas offcanvas-start bg-pink text-white" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
    <div class="offcanvas-header">
        <span class="fs-5 text-red">Tribite AdminPanel</span>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column justify-content-between px-3 pt-2 text-white">
        <div>
            <!-- <a href="/dashboard" class="d-flex align-items-center mb-3 text-white text-decoration-none">
                <img src="/tribite/assets/img/Logo.png" alt="Logo" class="img-fluid me-2" style="max-width: 40px;">
                <span class="fs-5 text-red">Tribite AdminPanel</span>
            </a> -->
            <ul class="nav nav-pills flex-column w-100" id="menu">
                <li class="nav-item">
                    <a href="/home" class="nav-link text-black link-danger">
                        <i class="fa fa-home"></i> <span class="ms-2">Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link text-black link-danger">
                        <i class="fa fa-tachometer"></i> <span class="ms-2">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/katalogmanage" class="nav-link text-black link-danger">
                        <i class="fa fa-table"></i> <span class="ms-2">Katalog</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/akun" class="nav-link text-black link-danger">
                        <i class="fa fa-address-card-o"></i> <span class="ms-2">Akun</span>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</div>