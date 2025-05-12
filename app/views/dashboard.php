<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; 
include PARTIALS_PATH . 'header.php'; 
// echo "Requested URI: " . $uri;

?>


<div class="container-fluid">
    <div class="row">
        <?php include PARTIALS_PATH . 'sidebar.php'; ?>
        <div class="col">
            <div class="container mt-4">
                <h1>Dashboard</h1>
                <p>Halaman Dashboard.</p>
            </div>
        </div>
    </div>
</div>

<?php
include PARTIALS_PATH . 'footer.php'; 
?> 
