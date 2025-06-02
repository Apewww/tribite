<nav class="navbar navbar-expand-md fixed-top">
    <div class="container">
        <div class="navbar-brand d-flex align-items-center">
            <img src="/tribite/assets/img/Logo.png" alt="Logo Navbar" height="50" width="50">
            <span class="ms-2 fw-bold">TRIBITE</span>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto text-center text-md-start">

                <li class="nav-item">
                    <a href="/home" class="nav-link text-black link-danger <?= ($_SERVER['REQUEST_URI'] == '/home') ? 'active' : ''; ?>">
                        Beranda
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/menu" class="nav-link text-black link-danger <?= ($_SERVER['REQUEST_URI'] == '/menu') ? 'active' : ''; ?>">
                        Daftar Menu
                    </a>
                </li>


                <li class="nav-item">
                    <button type="button" class="btn btn-danger rounded-5 d-block mb-2 mb-md-0 mx-md-2 w-100" data-bs-toggle="modal" data-bs-target="#searchModal">
                        <img src="/tribite/assets/img/search-icon.png" height="18" width="18" alt="Search">
                    </button>
                </li>

                <?php if (isset($_SESSION['user'])): ?>
                    <li class="nav-item dropdown ms-md-4">
                        <a href="#" class="btn btn-danger dropdown-toggle d-flex align-items-center justify-content-center rounded-5 px-2 py-2"
                           id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-circle-user text-white me-2" style="font-size: 20px;"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                            <?php if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 1): ?>
                                <!-- <?= $_SESSION['user']['role']; ?> -->
                                <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                            <?php endif; ?>
                            <li><a class="dropdown-item" href="/profile">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/logout">Keluar</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item ms-md-2">
                        <a href="/login" class="btn btn-danger rounded-5 d-block mx-md-2 ">Masuk</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
     
    </div>
</nav>