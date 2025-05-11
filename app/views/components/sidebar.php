<style>
    body {
        background-color: white;
        margin: 0px;
    }
</style>

<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-pink position-fixed h-100">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white h-100">
        <!-- Logo -->
        <a href="/dashboard" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-5 d-none d-sm-inline text-red">Tribite AdminPanel</span>
        </a>

        <!-- Navigation -->
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start w-100" id="menu">
            <li class="nav-item w-100">
                <a href="/home" class="nav-link px-2 text-black link-danger">
                    <i class="fa fa-home"></i> <span class="ms-2 d-none d-sm-inline">Home</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a href="/dashboard" class="nav-link px-2 text-black link-danger">
                    <i class="fa fa-tachometer"></i> <span class="ms-2 d-none d-sm-inline">Dashboard</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a href="/akun" class="nav-link px-2 text-black link-danger">
                    <i class="fa fa-address-card-o"></i> <span class="ms-2 d-none d-sm-inline">Akun</span>
                </a>
            </li>
        </ul>

        <!-- User Profile at bottom -->
        <div class="dropdown pb-4 mt-auto w-100">
            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle text-black" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://cdn.discordapp.com/avatars/695513585639620629/e2664a551c33b94de0dfa7c37f700b18.png?size=1024" alt="profile" width="30" height="30" class="rounded-circle">
                <span class="d-none d-sm-inline ms-2">Liz Ive</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Keluar</a></li>
            </ul>
        </div>
    </div>
</div>