<?php
session_start();
$pageTitle = "Akun Management";
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; 
include PARTIALS_PATH . 'header.php';
include PARTIALS_PATH . 'validation_role.php';


$stmt = $conn->prepare("CALL CountAkun()");
$stmt->execute();
$result = $stmt->get_result();
$akun = $result->fetch_assoc();
$stmt->close();

$stmt = $conn->prepare("CALL CountKupon()");
$stmt->execute();
$result = $stmt->get_result();
$kupon = $result->fetch_assoc();
$stmt->close();

$stmt = $conn->prepare("CALL CountKatalog()");
$stmt->execute();
$result = $stmt->get_result();
$katalog = $result->fetch_assoc();
$stmt->close();

$stmt = $conn->prepare("CALL CountKategori()");
$stmt->execute();
$result = $stmt->get_result();
$kategori = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>


<div class="container-fluid">
    <div class="row">
        <?php include PARTIALS_PATH . 'sidebar.php'; ?>
        <div class="col">
            <div class="container mt-4">
                <!-- <div class="d-flex flex-column flex-md-row justify-content-md-between justify-content-center align-items-center">
                  <div class="text-center text-md-start">
                    <h3>Dashboard</h3>
                    <p>Halaman dashboard.</p>
                  </div>
                </div> -->
                <div class="container mt-4">
                  <div class="row g-4">
                    <div class="col-md-3">
                      <div class="card text-dark bg-pink h-100">
                        <div class="card-body">
                          <h5 class="card-title">Total Akun</h5>
                          <p class="card-text fs-3"><?= $akun['total_akun'] ?? 0 ?></p>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="card text-dark bg-pink h-100">
                        <div class="card-body">
                          <h5 class="card-title">Total Kupon</h5>
                          <p class="card-text fs-3"><?= $kupon['total_kupon'] ?? 0 ?></p>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="card text-dark bg-pink h-100">
                        <div class="card-body">
                          <h5 class="card-title">Total Katalog</h5>
                          <p class="card-text fs-3"><?= $katalog['total_katalog'] ?? 0 ?></p>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="card text-dark bg-pink h-100">
                        <div class="card-body">
                          <h5 class="card-title">Total Kategori</h5>
                          <p class="card-text fs-3"><?= $kategori['total_kategori'] ?? 0 ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
include PARTIALS_PATH . 'footer.php'; 
?> 
