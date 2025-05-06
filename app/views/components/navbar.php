<style>
    .navbar .nav-link.active {
    color: red !important; /* Warna merah untuk link aktif */
    font-weight: bold; /* Opsional: Tambahkan penekanan */
}

</style>
<nav class="navbar navbar-expand-md fixed-top">
    <div class="container">
        <div class="navbar-brand">
            <img src="\tribite\assets\img\Logo.png" alt="Logo Navbar" height="50" width="50">
            <span>TRIBITE</span>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto text-center text-md-start">
                <li class="nav-item">
                    <a href="/home" class="nav-link text-black link-danger <?php echo ($_SERVER['REQUEST_URI'] == '/home') ? 'active' : ''; ?>">Beranda</a>
                </li>
                <li class="nav-item">
                    <a href="/menu" class="nav-link text-black link-danger <?php echo ($_SERVER['REQUEST_URI'] == '/menu') ? 'active' : ''; ?>">Daftar Menu</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-black link-danger">Promo</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="link-danger btn btn-danger rounded-5 d-block mb-2 mb-md-0 mx-md-2">
                        <img src="\tribite\assets\img\search-icon.png" height="18" width="18">
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/login" class="btn btn-danger rounded-5 d-block">Masuk</a>
                </li>
            </ul>
        </div>
    </div>
</nav>