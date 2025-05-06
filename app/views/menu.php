<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tribite Menu</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style> 
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background-color: #fce9e9;
      color: #333;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 40px;
      background-color: #fce9e9;
    }

    .navbar a:hover {
      text-decoration: none;
      color: red;
    }

    .logo {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .logo img {
      width: 40px;
      height: 40px;
    }

    .nav-menu a {
      margin: 0 15px;
      text-decoration: none;
      color: #333;
    }

    .nav-menu a.active {
  color: red; /* Warna merah untuk link aktif */
  font-weight: bold; /* Opsional: Tambahkan penekanan */
}

    .login-btn {
      background-color: red;
      color: white;
      border: none;
      padding: 8px 15px;
      border-radius: 15px;
      cursor: pointer;
    }

    .login-btn:hover {
      background-color:rgb(0, 174, 255);
    }

    .search-bar {
      display: flex;
      justify-content: center;
      margin: 30px;
    }

    .search-wrapper {
      position: relative;
      width: 600px;
    }

    .search-wrapper input {
      width: 100%;
      padding: 12px 45px 12px 20px;
      border-radius: 25px;
      border: none;
      font-size: 16px;
    }

    .search-wrapper button {
  position: absolute;
  right: 20px; /* Ubah nilai right untuk memindahkan tombol lebih ke kiri */
  top: 50%;
  transform: translateY(-50%);
  background: none;
  border: none;
  cursor: pointer;
  font-size: 20px;
  color: rgb(0, 0, 0);
}

    .menu-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 25px;
      padding: 0 50px 50px;
      justify-items: center;
    }

    .menu-card {
      background-color: white;
      border-radius: 15px;
      padding: 15px;
      width: 220px;
      text-align: center;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
      cursor: default;
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

    .rating {
      margin-top: 5px;
      color: #888;
    }

    .menu-card button {
      background: none;
      border: none;
      cursor: pointer;
      font-size: 20px;
      color: rgb(0, 0, 0);
      margin-top: 10px;
      padding: 5px 10px;
    }

    .menu-card button:hover{
      background-color: red;
      color: white;
      border-radius: 5px;
      padding: 5px 10px;
    }
  </style>
</head>
<body>
  <header class="navbar">
    <div class="logo">
      <img src="/tribite/assets/img/Logo.png" alt="Tribite Logo">
      <span>TRIBITE</span>
    </div>
    <nav class="nav-menu">
      <a href="/home">Beranda</a>
      <a href="/menu" class="active">Daftar Menu</a>
      <a href="#">Promo</a>
      <a href="/keranjang"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
      <a href="/login"><button class="login-btn">Masuk</button></a>
    </nav>
  </header>

  <main>
    <form class="search-bar" onsubmit="searchMenu(event)">
      <div class="search-wrapper">
        <input type="text" id="searchInput" placeholder="Cari makanan...">
        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
      </div>
    </form>

    <div class="menu-grid" id="menuGrid">
      <!-- Semua menu-card cukup disimpan di dalam 1 div menu-grid -->
      <div class="menu-card" data-name="kue stroberi">
        <img src="/tribite/assets/img/LandingLogo.png" alt="Contoh Makanan">
        <h3>Contoh Makanan 1</h3>
        <div class="rating" data-rating="0">
          <i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
        </div>
        <p class="price">Rp. 30.000</p>
        <button class="buy">Pesan</button>
        <button><i class="fa fa-cart-plus"></i></button>
      </div>

      <div class="menu-card" data-name="kue stroberi">
        <img src="/tribite/assets/img/LandingLogo.png" alt="Contoh Makanan">
        <h3>Contoh Makanan 1</h3>
        <div class="rating" data-rating="0">
          <i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
        </div>
        <p class="price">Rp. 30.000</p>
        <button class="buy">Pesan</button>
        <button><i class="fa fa-cart-plus"></i></button>
      </div>

      <div class="menu-card" data-name="kue stroberi">
        <img src="/tribite/assets/img/LandingLogo.png" alt="Contoh Makanan">
        <h3>Contoh Makanan 1</h3>
        <div class="rating" data-rating="0">
          <i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
        </div>
        <p class="price">Rp. 30.000</p>
        <button class="buy">Pesan</button>
        <button><i class="fa fa-cart-plus"></i></button>
      </div>

      <div class="menu-card" data-name="kue stroberi">
        <img src="/tribite/assets/img/LandingLogo.png" alt="Contoh Makanan">
        <h3>Contoh Makanan 1</h3>
        <div class="rating" data-rating="0">
          <i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
        </div>
        <p class="price">Rp. 30.000</p>
        <button class="buy">Pesan</button>
        <button><i class="fa fa-cart-plus"></i></button>
      </div>

      <div class="menu-card" data-name="kue stroberi">
        <img src="/tribite/assets/img/LandingLogo.png" alt="Contoh Makanan">
        <h3>Contoh Makanan 1</h3>
        <div class="rating" data-rating="0">
          <i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
        </div>
        <p class="price">Rp. 30.000</p>
        <button class="buy">Pesan</button>
        <button><i class="fa fa-cart-plus"></i></button>
      </div>

      <div class="menu-card" data-name="kue stroberi">
        <img src="/tribite/assets/img/LandingLogo.png" alt="Contoh Makanan">
        <h3>Contoh Makanan 1</h3>
        <div class="rating" data-rating="0">
          <i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
        </div>
        <p class="price">Rp. 30.000</p>
        <button class="buy">Pesan</button>
        <button><i class="fa fa-cart-plus"></i></button>
      </div>

      <div class="menu-card" data-name="kue stroberi">
        <img src="/tribite/assets/img/LandingLogo.png" alt="Contoh Makanan">
        <h3>Contoh Makanan 1</h3>
        <div class="rating" data-rating="0">
          <i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
        </div>
        <p class="price">Rp. 30.000</p>
        <button class="buy">Pesan</button>
        <button><i class="fa fa-cart-plus"></i></button>
      </div>

      <div class="menu-card" data-name="kue stroberi">
        <img src="/tribite/assets/img/LandingLogo.png" alt="Contoh Makanan">
        <h3>Contoh Makanan 1</h3>
        <div class="rating" data-rating="0">
          <i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
        </div>
        <p class="price">Rp. 30.000</p>
        <button class="buy">Pesan</button>
        <button><i class="fa fa-cart-plus"></i></button>
      </div>

      <div class="menu-card" data-name="kue stroberi">
        <img src="/tribite/assets/img/LandingLogo.png" alt="Contoh Makanan">
        <h3>Contoh Makanan 1</h3>
        <div class="rating" data-rating="0">
          <i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
        </div>
        <p class="price">Rp. 30.000</p>
        <button class="buy">Pesan</button>
        <button><i class="fa fa-cart-plus"></i></button>
      </div>

      <div class="menu-card" data-name="kue stroberi">
        <img src="/tribite/assets/img/LandingLogo.png" alt="Contoh Makanan">
        <h3>Contoh Makanan 1</h3>
        <div class="rating" data-rating="0">
          <i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
        </div>
        <p class="price">Rp. 30.000</p>
        <button class="buy">Pesan</button>
        <button><i class="fa fa-cart-plus"></i></button>
      </div>

      <!-- Tambahkan menu lainnya di sini, cukup di dalam div.menu-grid yang sama -->

    </div>
  </main>
</body>

</html>
