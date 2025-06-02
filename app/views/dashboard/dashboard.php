<?php
session_start();
$pageTitle = "Akun Management";
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; 
include PARTIALS_PATH . 'header.php';
include PARTIALS_PATH . 'validation_role.php';


// $stmt = $conn->prepare("CALL GetAkun");
// $stmt->execute();
// $result = $stmt->get_result();
// $akun = [];
// if ($result->num_rows >= 1) {
//     while ($row = $result->fetch_assoc()) {
//         $akun[] = $row;
//     }
// } else {
//     $_SESSION['notif'] = ["Warn", "Akun tidak ditemukan!"];
// }
// $stmt->close();
// $conn->close();

// echo '<pre>';
// print_r($akun);
// echo '</pre>';
?>


<div class="container-fluid">
    <div class="row">
        <?php include PARTIALS_PATH . 'sidebar.php'; ?>
        <div class="col">
            <div class="container mt-4">
                <div class="d-flex flex-column flex-md-row justify-content-md-between justify-content-center align-items-center">
                  <div class="text-center text-md-start">
                    <h3>Dashboard</h3>
                    <p>Halaman dashboard.</p>
                  </div>
                </div>
                <div class="container mt-4">
  <div class="row g-4">
    <!-- Card: Akun -->
    <div class="col-md-3">
      <div class="card text-white bg-primary h-100">
        <div class="card-body">
          <h5 class="card-title">Total Akun</h5>
          <p class="card-text fs-3"><?= $jumlah_akun ?? 0 ?></p>
        </div>
      </div>
    </div>

    <!-- Card: Kupon -->
    <div class="col-md-3">
      <div class="card text-white bg-success h-100">
        <div class="card-body">
          <h5 class="card-title">Total Kupon</h5>
          <p class="card-text fs-3"><?= $jumlah_kupon ?? 0 ?></p>
        </div>
      </div>
    </div>

    <!-- Card: Katalog -->
    <div class="col-md-3">
      <div class="card text-white bg-warning h-100">
        <div class="card-body">
          <h5 class="card-title">Total Katalog</h5>
          <p class="card-text fs-3"><?= $jumlah_katalog ?? 0 ?></p>
        </div>
      </div>
    </div>

    <!-- Card: Kategori -->
    <div class="col-md-3">
      <div class="card text-white bg-danger h-100">
        <div class="card-body">
          <h5 class="card-title">Total Kategori</h5>
          <p class="card-text fs-3"><?= $jumlah_kategori ?? 0 ?></p>
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
