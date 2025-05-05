<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tribite Menu</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
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
  background-color: #fff;
  border-bottom: 1px solid #ddd;
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

.login-btn {
  background-color: red;
  color: white;
  border: none;
  padding: 8px 15px;
  border-radius: 15px;
  cursor: pointer;
}

.search-bar {
  display: flex;
  justify-content: center;
  margin: 30px;
}

.search-bar input {
  width: 600px;
  padding: 12px;
  border-radius: 25px 0 0 25px;
  border: none;
  font-size: 16px;
}

.search-bar button {
  padding: 12px;
  background-color: red;
  border: none;
  border-radius: 0 25px 25px 0;
  cursor: pointer;
  color: white;
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

  </style>

</head>
<body>
  <header class="navbar">
    <div class="logo">
      <img src="/tribite/assets/img/Logo.png" alt="Tribite Logo">
      <span>TRIBITE</span>
    </div>
    <nav class="nav-menu">
      <a href="#">Beranda</a>
      <a href="#">Daftar Menu</a>
      <a href="#">Promo</a>
      <a href=""><button class="login-btn">Masuk</button></a>
    </nav>
  </header>

  <main>
    <div class="search-bar">
      <input type="text" placeholder="Cari makanan...">
      <button><span>🔍</span></button>
    </div>

    <div class="menu-grid">
      <!-- Ulangi div ini untuk tiap item -->
      <div class="menu-card">
        <img src="/tribite/assets/img/LandingLogo.png" alt="Contoh Makanan">
        <h3>Contoh Makanan 1</h3>
        <p>Deskripsi makanan</p>
        <p class="price">Rp. 30.000</p>
        <div class="rating">☆ ☆ ☆ ☆ ☆</div>
      </div>

      <!-- Duplikat sesuai jumlah item -->
      <div class="menu-card">
        <img src="/tribite/assets/img/LandingLogo.png" alt="Contoh Makanan">
        <h3>Contoh Makanan 1</h3>
        <p>Deskripsi makanan</p>
        <p class="price">Rp. 30.000</p>
        <div class="rating">☆ ☆ ☆ ☆ ☆</div>
      </div>

            <!-- Duplikat sesuai jumlah item -->
            <div class="menu-card">
        <img src="/tribite/assets/img/LandingLogo.png" alt="Contoh Makanan">
        <h3>Contoh Makanan 1</h3>
        <p>Deskripsi makanan</p>
        <p class="price">Rp. 30.000</p>
        <div class="rating">☆ ☆ ☆ ☆ ☆</div>
      </div>

            <!-- Duplikat sesuai jumlah item -->
            <div class="menu-card">
        <img src="/tribite/assets/img/LandingLogo.png" alt="Contoh Makanan">
        <h3>Contoh Makanan 1</h3>
        <p>Deskripsi makanan</p>
        <p class="price">Rp. 30.000</p>
        <div class="rating">☆ ☆ ☆ ☆ ☆</div>
      </div>

            <!-- Duplikat sesuai jumlah item -->
            <div class="menu-card">
        <img src="/tribite/assets/img/LandingLogo.png" alt="Contoh Makanan">
        <h3>Contoh Makanan 1</h3>
        <p>Deskripsi makanan</p>
        <p class="price">Rp. 30.000</p>
        <div class="rating">☆ ☆ ☆ ☆ ☆</div>
      </div>

      <!-- Tambahkan lagi sesuai kebutuhan -->
    </div>
  </main>
</body>
</html>
