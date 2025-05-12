<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; // Memanggil Config
include PARTIALS_PATH . 'header.php'; // Memanggil Header
?>

<div class="container min-vh-100 d-flex align-items-center justify-content-center" id="landingContent">
    <div class="row align-items-center text-center text-md-start">
        <div class="col-12 col-md-6 order-2 order-md-2">
            <h1 class="display-4 fw-bold text-danger">404 - Page Not Found</h1>
            <p class="lead text-muted">
                Maaf, halaman yang Anda cari tidak ditemukan atau telah dipindahkan.
            </p>
            <a href="/home" class="btn btn-danger rounded-4 mt-3">
                Kembali ke Beranda
            </a>
        </div>
        <div class="col-12 col-md-6 order-1 order-md-1 mb-4 mb-md-0 text-center">
            <img src="/tribite/assets/img/Logo.png" alt="Landing Logo" class="img-fluid" style="max-width: 300px;">
        </div>
    </div>
</div>

<?php
include PARTIALS_PATH . 'footer.php'; // Memanggil Footer
?>
