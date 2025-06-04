<?php
$pageTitle = "Home";
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; 
include AUTH;
include PARTIALS_PATH . 'header.php';
session_start();
?>


<?php include PARTIALS_PATH . 'navbar.php';?>
<div class="container min-vh-100 d-flex" id="landingContent">
    <div class="row align-content-center align-items-center w-100 mx-auto">
        <div class="col-12 col-md-8 order-2 order-md-1 text-center text-md-start py-5 py-md-0">
            <span class="text-danger h5 d-block mb-2 mb-md-3">Halo Selamat datang di ..</span>
            <span class="h1 d-block mb-2 mb-md-3">TRIBITE</span>
            <p class="h5 pb-3">
                Aplikasi pemesan makanan melalui aplikasi cloud<br> 
                yang siap melayani dimana saja dan kapan saja
            </p>  
            <button class="btn btn-danger rounded-5">Pesan Sekarang</button>
        </div>
        <div class="col-12 col-md-4 order-1 order-md-2 text-center">
            <img class="img-fluid foodicon" src="/tribite/assets/img/LandingLogo.png" alt="Landing Logo">
        </div>
    </div>
</div>


<?php
include PARTIALS_PATH . 'footer.php'; 
?> 
