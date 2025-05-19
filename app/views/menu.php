<!-- filepath: c:\xampp\htdocs\tribite\app\views\menu.php -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tribite Menu</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background-color: #fce9e9;
      font-family: 'Poppins', sans-serif;
      padding-top: 56px; /* Tambahkan padding agar konten tidak tertutup navbar */
    }
    .menu-card {
      margin: 30px;
      background-color: white;
      border-radius: 15px;
      padding: 15px;
      text-align: center;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }
    .menu-card img {
      width: 100%;
      height: auto;
      border-radius: 12px;
    }
    .menu-card h3 {
      font-size: 16px;
      margin-top: 10px;
    }
    .menu-card p {
      font-size: 14px;
      margin: 5px 0;
    }
    .price {
      font-weight: bold;
      margin-top: 10px;
    }
    .menu-card button {
      margin-top: 10px;
    }
  </style>
</head>
<body>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; ?>
<?php include PARTIALS_PATH . 'navbar.php'; ?>

  <div class="container mt-0">
    <div class="row g-4">
      <!-- Menu Card 1 -->
      <div class="col-md-4 col-lg-3">
        <div class="menu-card">
          <img src="/tribite/assets/img/LandingLogo.png" alt="Contoh Makanan">
          <h3>Contoh Makanan 1</h3>
          <p class="price">Rp. 30.000</p>
          <div class="rating">
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <button class="btn btn-danger btn-sm"><i class="fa fa-cart-plus"></i></button>
          <button class="btn btn-danger btn-sm">Pesan</button>
        </div>
      </div>  
      <!-- Tambahkan menu lainnya di sini -->
      <div class="col-md-4 col-lg-3">
        <div class="menu-card">
          <img src="/tribite/assets/img/LandingLogo.png" alt="Contoh Makanan">
          <h3>Contoh Makanan 1</h3>
          <p class="price">Rp. 30.000</p>
          <div class="rating">
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <button class="btn btn-danger btn-sm"><i class="fa fa-cart-plus"></i></button>
          <button class="btn btn-danger btn-sm">Pesan</button>
        </div>
      </div>
      <div class="col-md-4 col-lg-3">
        <div class="menu-card">
          <img src="/tribite/assets/img/LandingLogo.png" alt="Contoh Makanan">
          <h3>Contoh Makanan 1</h3>
          <p class="price">Rp. 30.000</p>
          <div class="rating">
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <button class="btn btn-danger btn-sm"><i class="fa fa-cart-plus"></i></button>
          <button class="btn btn-danger btn-sm">Pesan</button>
        </div>
      </div>
      <div class="col-md-4 col-lg-3">
        <div class="menu-card">
          <img src="/tribite/assets/img/LandingLogo.png" alt="Contoh Makanan">
          <h3>Contoh Makanan 1</h3>
          <p class="price">Rp. 30.000</p>
          <div class="rating">
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <button class="btn btn-danger btn-sm"><i class="fa fa-cart-plus"></i></button>
          <button class="btn btn-danger btn-sm">Pesan</button>
        </div>
      </div>
      <div class="col-md-4 col-lg-3">
        <div class="menu-card">
          <img src="/tribite/assets/img/LandingLogo.png" alt="Contoh Makanan">
          <h3>Contoh Makanan 1</h3>
          <p class="price">Rp. 30.000</p>
          <div class="rating">
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <button class="btn btn-danger btn-sm"><i class="fa fa-cart-plus"></i></button>
          <button class="btn btn-danger btn-sm">Pesan</button>
        </div>
      </div>
      <div class="col-md-4 col-lg-3">
        <div class="menu-card">
          <img src="/tribite/assets/img/LandingLogo.png" alt="Contoh Makanan">
          <h3>Contoh Makanan 1</h3>
          <p class="price">Rp. 30.000</p>
          <div class="rating">
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <button class="btn btn-danger btn-sm"><i class="fa fa-cart-plus"></i></button>
          <button class="btn btn-danger btn-sm">Pesan</button>
        </div>
      </div>
      <div class="col-md-4 col-lg-3">
        <div class="menu-card">
          <img src="/tribite/assets/img/LandingLogo.png" alt="Contoh Makanan">
          <h3>Contoh Makanan 1</h3>
          <p class="price">Rp. 30.000</p>
          <div class="rating">
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <button class="btn btn-danger btn-sm"><i class="fa fa-cart-plus"></i></button>
          <button class="btn btn-danger btn-sm">Pesan</button>
        </div>
      </div>
      <div class="col-md-4 col-lg-3">
        <div class="menu-card">
          <img src="/tribite/assets/img/LandingLogo.png" alt="Contoh Makanan">
          <h3>Contoh Makanan 1</h3>
          <p class="price">Rp. 30.000</p>
          <div class="rating">
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <button class="btn btn-danger btn-sm"><i class="fa fa-cart-plus"></i></button>
          <button class="btn btn-danger btn-sm">Pesan</button>
        </div>
      </div>
      <div class="col-md-4 col-lg-3">
        <div class="menu-card">
          <img src="/tribite/assets/img/LandingLogo.png" alt="Contoh Makanan">
          <h3>Contoh Makanan 1</h3>
          <p class="price">Rp. 30.000</p>
          <div class="rating">
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <button class="btn btn-danger btn-sm"><i class="fa fa-cart-plus"></i></button>
          <button class="btn btn-danger btn-sm">Pesan</button>
        </div>
      </div>
      <div class="col-md-4 col-lg-3">
        <div class="menu-card">
          <img src="/tribite/assets/img/LandingLogo.png" alt="Contoh Makanan">
          <h3>Contoh Makanan 1</h3>
          <p class="price">Rp. 30.000</p>
          <div class="rating">
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
          </div>
          <button class="btn btn-danger btn-sm"><i class="fa fa-cart-plus"></i></button>
          <button class="btn btn-danger btn-sm">Pesan</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
