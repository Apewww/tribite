<?php
$pageTitle = "Menu";
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; 
include PARTIALS_PATH . 'header.php';
session_start();

$katalog = [];
if ($stmt = $conn->prepare("CALL GetKatalog()")) {
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $katalog[] = $row;
        }
    } else {
        $_SESSION['notif'] = ["Warn", "Katalog tidak ditemukan!"];
    }
    $stmt->close();
    $conn->next_result();
}

?>


<?php include PARTIALS_PATH . 'navbar.php';?>
<div class="container min-vh-100 d-flex menu-body" id="menuContent">
<div class="container py-4">
  <div class="row">
    <div class="mb-4">
      <!-- <input type="text" id="searchInput" class="form-control" placeholder="Cari menu..." onkeyup="filterMenu()"> -->
      <!-- <input type="text" id="searchInput" class="form-control" placeholder="Cari menu..." onkeyup="filterMenu()" value="<?= htmlspecialchars($_POST['q'] ?? '') ?>"> -->
      <input type="text" id="searchInput" class="form-control" name="q" value="<?= htmlspecialchars($_POST['q'] ?? '') ?>" 
       oninput="filterMenu()" />
    </div>
    <?php foreach ($katalog as $item): ?>
      <div class="col-md-4 col-lg-3 mb-4">
        <div class="card h-100 text-center d-flex flex-column">
          <img src="<?= $item['gambar']; ?>" class="card-img-top img-fluid" alt="<?= $item['nama']; ?>" style="height: 150px; object-fit: cover;">
          <div class="card-body d-flex flex-column justify-content-between">
            <h5 class="card-title"><?= $item['nama']; ?></h5>
            <p class="card-text text-danger fw-bold">Rp. <?= number_format($item['harga'], 0, ',', '.'); ?></p>
            <div class="rating mb-2">
              <?php for ($i = 0; $i < 5; $i++): ?>
                <i class="fa-regular fa-star"></i>
              <?php endfor; ?>
            </div>
            <div class="mt-auto">
              <button class="btn btn-danger btn-sm me-1"><i class="fa fa-cart-plus"></i></button>
              <button class="btn btn-danger btn-sm">Pesan</button>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('searchInput');
    if (input && input.value.trim() !== '') {
      filterMenu();
    }
  });
</script>

<?php
include PARTIALS_PATH . 'footer.php'; 
?> 
