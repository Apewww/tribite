<?php
$pageTitle = "Menu";
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; 
include AUTH;
include PARTIALS_PATH . 'header.php';
session_start();

$katalog = [];
if ($stmt = $conn->prepare("CALL GetKatalog()")) {
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          if($row['status'] == 'aktif') {
            $katalog[] = $row;
          }
        }
    } else {
        $_SESSION['notif'] = ["Warn", "Katalog tidak ditemukan!"];
    }
    $stmt->close();
    $conn->next_result();
}

$kategori = [];
if ($stmt = $conn->prepare("CALL GetKategori()")) {
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $kategori[] = $row;
        }
    } else {
        $_SESSION['notif'] = ["Warn", "Kategori tidak ditemukan!"];
    }
    $stmt->close();
    $conn->next_result();
}

$conn->close();

$kategori_lookup = [];
foreach ($kategori as $tipe) {
  $kategori_lookup[$tipe['id']] = $tipe['nama'];
}

if (isset($_SESSION['notif'])) {
  list($headMessage, $message) = $_SESSION['notif'];
  unset($_SESSION['notif']);
}
?>  
<div style="position: fixed; top: 1rem; right: 1rem; z-index: 1050;" id="notif">
  <?php if (isset($headMessage) && isset($message)): ?>
    <?php include PARTIALS_PATH . 'notifikasi.php'; ?>
  <?php endif; ?>
</div>

<?php include PARTIALS_PATH . 'navbar.php';?>
<div class="container min-vh-100 d-flex menu-body" id="menuContent">
  <div class="container py-4">
    <div class="row">
      <div class="mb-4">
        <div class="input-group">
          <select id="kategoriSelect" class="form-select flex-shrink-0" style="max-width: 150px;">
            <option value="">Kategori</option>
              <?php foreach($kategori as $tipe): ?>
                <option value="<?= htmlspecialchars($tipe['nama']) ?>">
                  <?= htmlspecialchars($tipe['nama']) ?>
                </option>
              <?php endforeach; ?>
          <input type="text" id="searchInput" class="form-control" placeholder="Masukkan nama menu...">
          <input type="text" id="searchInputNav" class="form-control" placeholder="Masukkan nama menu..." 
          oninput="filterMenu()" 
          value="<?= $_POST['q'] ?? '' ?>"  hidden>
          <button class="btn btn-danger" type="button" onclick="filterMenu()">Cari</button>
        </div>
      </div>
      <?php foreach ($katalog as $item): ?>
        <div class="col-md-4 col-lg-3 mb-4">
          <div class="card h-100 text-center d-flex flex-column" data-kategori="<?= htmlspecialchars($kategori_lookup[$item['kategori_id']] ?? '') ?>">
            <img src="<?= $item['gambar']; ?>" class="card-img-top img-fluid" alt="<?= $item['nama']; ?>" style="height: 150px; object-fit: cover;">
            <div class="card-body d-flex flex-column justify-content-between">
              <h5 class="card-title"><?= $item['nama']; ?></h5>
              <p class="card-text text-danger fw-bold">Rp. <?= number_format($item['harga'], 0, ',', '.'); ?></p>
              <div class="rating mb-2">
                <?php 
                $rating = (int)$item['rating'];
                for ($i = 0; $i < 5; $i++): 
                    if ($i < $rating): ?>
                        <img src="/tribite/assets/img/star.png" alt="star" class="star" width="18" height="16">
                    <?php else: ?>
                        <img src="/tribite/assets/img/star-none.png" alt="star" class="star" width="18" height="16">
                    <?php endif;
                endfor;
                ?>
              </div>
              <div class="mt-auto">
                <!-- <button class="btn btn-danger btn-sm me-1"><i class="fa fa-cart-plus"></i></button> -->
                <button class="btn btn-danger btn-sm me-1 btn-add-to-cart"
                    data-id="<?= $item['id']; ?>"
                    data-nama="<?= htmlspecialchars($item['nama']); ?>"
                    data-harga="<?= $item['harga']; ?>"
                    data-gambar="<?= $item['gambar']; ?>"
                  >
                    <i class="fa fa-cart-plus"></i>
                </button>
                <button class="btn btn-danger btn-sm btn-pesan"
                  data-id="<?= $item['id']; ?>"
                  data-nama="<?= htmlspecialchars($item['nama']); ?>"
                  data-harga="<?= $item['harga']; ?>"
                  data-gambar="<?= $item['gambar']; ?>"
                >Pesan</button>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
<form action="/menu/keranjang" method="POST" id="Keranjang" class="d-none">
  <input type="hidden" name="keranjangData" id="keranjangData">
  <input type="hidden" name="ids" id="keranjangIds">
  <button type="submit" class="position-fixed bottom-0 end-0 m-4 bg-danger text-white rounded-circle d-flex justify-content-center align-items-center"
       style="width: 60px; height: 60px; z-index: 1050;">
      <i class="fa fa-shopping-cart fa-lg"></i>
      <span id="cart-count"
        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-dark">
      </span>
  </button>
</form>

</div>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.btn-pesan').forEach(button => {
      button.addEventListener('click', function () {
        const id = this.dataset.id;
        const nama = this.dataset.nama;
        const harga = parseInt(this.dataset.harga);
        const gambar = this.dataset.gambar;
      
        let keranjang = JSON.parse(localStorage.getItem('keranjang')) || [];
        const existingItem = keranjang.find(item => item.id === id);
        if (existingItem) {
          existingItem.jumlah += 1;
        } else {
          keranjang.push({ id, nama, harga, gambar, jumlah: 1 });
        }
        localStorage.setItem('keranjang', JSON.stringify(keranjang));
      
        document.getElementById('keranjangData').value = JSON.stringify(keranjang);
        document.getElementById('keranjangIds').value = JSON.stringify(keranjang.map(i => i.id));
        document.getElementById('Keranjang').submit();
      });
    });

    const input = document.getElementById('searchInput');
    const inputNav = document.getElementById('searchInputNav');
    if (inputNav && inputNav.value.trim() !== '') {
      // Opsional: Salin ke input utama
      const input = document.getElementById('searchInput');
      if (input) input.value = inputNav.value;
      filterMenu();
    }
    let keranjang = JSON.parse(localStorage.getItem('keranjang')) || [];
    if (keranjang.length > 0) {
      const totalItem = keranjang.reduce((total, item) => total + item.jumlah, 0);
      const floatingCart = document.getElementById('Keranjang');
      document.getElementById('cart-count').textContent = totalItem;
      if (totalItem > 0) {
        floatingCart.classList.remove('d-none');
      }
    }

    document.querySelectorAll('.btn-add-to-cart').forEach(button => {
      button.addEventListener('click', function () {
          const id = this.dataset.id;
          const nama = this.dataset.nama;
          const harga = parseInt(this.dataset.harga);
          const gambar = this.dataset.gambar;

          const existingItem = keranjang.find(item => item.id === id);
          if (existingItem) {
              existingItem.jumlah += 1;
          } else {
              keranjang.push({ id, nama, harga, jumlah: 1, gambar });
          }

          updateCartCount();
          LocalStorage();
      });
    });


    function updateCartCount() {
        const totalItem = keranjang.reduce((total, item) => total + item.jumlah, 0);
        document.getElementById('cart-count').textContent = totalItem;
    
        const floatingCart = document.getElementById('Keranjang');
        if (totalItem > 0) {
            floatingCart.classList.remove('d-none');
        }
        // console.log(keranjang);
    }

    function LocalStorage() {
        localStorage.setItem('keranjang', JSON.stringify(keranjang));
    }


    const keranjangForm = document.getElementById('Keranjang');
    keranjangForm.addEventListener('submit', function (e) {
      const hiddenInput = document.getElementById('keranjangData');
      hiddenInput.value = JSON.stringify(keranjang);
    
      const idList = keranjang.map(item => item.id);
      document.getElementById('keranjangIds').value = JSON.stringify(idList);
    
      console.log(idList);
    });


  });


</script>

<?php
include PARTIALS_PATH . 'footer.php'; 
?> 
