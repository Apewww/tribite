<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; // Memanggil Config
include PARTIALS_PATH . 'header.php'; // Memanggil Header
// echo "Requested URI: " . $uri;

?>


<div class="container-fluid">
    <div class="row">
        <!-- Sidebar tetap di-load di sini, tapi posisinya fixed -->
        <?php include PARTIALS_PATH . 'sidebar.php'; ?>
        
        <!-- Konten utama -->
        <div class="col py-3 content-margin">
            <h1>Dashboard</h1>
            <p>Halaman Dashboard.</p>
        </div>
    </div>
</div>

<?php
include PARTIALS_PATH . 'footer.php'; // Memanggil Footer
?> 
