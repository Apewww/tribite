<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; // Memanggil Config
include PARTIALS_PATH . 'header.php'; // Memanggil Header
// echo "Requested URI: " . $uri;

?>


<div class="container-fluid">
    <div class="row flex-nowrap">
        <?php include PARTIALS_PATH . 'sidebar.php'; // Memanggil Navbar ?>
        <div class="col py-3">
            Akun Management
        </div>
    </div>
</div>

<?php
include PARTIALS_PATH . 'footer.php'; // Memanggil Footer
?> 
