<?php
$pageTitle = "Menu";
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; 
include PARTIALS_PATH . 'header.php';

$menuItems = [
  [
    'nama' => 'Nasi Goreng Spesial',
    'harga' => 30000,
    'gambar' => '/tribite/assets/img/LandingLogo.png',
  ],
  [
    'nama' => 'Mie Ayam Jamur',
    'harga' => 25000,
    'gambar' => '/tribite/assets/img/LandingLogo.png',
  ],
  [
    'nama' => 'Sate Ayam',
    'harga' => 35000,
    'gambar' => '/tribite/assets/img/LandingLogo.png',
  ],
  [
    'nama' => 'Mie Ayam Jamur',
    'harga' => 25000,
    'gambar' => '/tribite/assets/img/LandingLogo.png',
  ],
    [
    'nama' => 'Nasi Goreng Spesial',
    'harga' => 30000,
    'gambar' => '/tribite/assets/img/LandingLogo.png',
  ],
  [
    'nama' => 'Mie Ayam Jamur',
    'harga' => 25000,
    'gambar' => '/tribite/assets/img/LandingLogo.png',
  ],
  [
    'nama' => 'Sate Ayam',
    'harga' => 35000,
    'gambar' => '/tribite/assets/img/LandingLogo.png',
  ],
  [
    'nama' => 'Mie Ayam Jamur',
    'harga' => 25000,
    'gambar' => '/tribite/assets/img/LandingLogo.png',
  ],
];
?>


<?php include PARTIALS_PATH . 'navbar.php';?>
<div class="container min-vh-100 d-flex menu-body" id="menuContent">
<div class="container py-4">
  <div class="row">
    <?php foreach ($menuItems as $item): ?>
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


<?php
include PARTIALS_PATH . 'footer.php'; 
?> 
