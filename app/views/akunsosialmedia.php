<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pengaturan Akun</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      display: flex;
      background-color: #f5f5f5;
    }

    .sidebar, .main, .submenu {
      flex: 1;
      padding: 20px;
      background-color: #fddede; /* warna pink muda dari Figma */
      min-height: 100vh;
      box-sizing: border-box;
    }

    .section-title {
      font-weight: bold;
      font-size: 1.2em;
      margin-bottom: 20px;
    }

    .card {
      background-color: white;
      border: 1px solid #ccc;
      border-radius: 8px;
      margin-bottom: 10px;
      padding: 15px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      cursor: pointer;
    }

    .card:hover {
      background-color: #f0f0f0;
    }

    .arrow {
      font-weight: bold;
    }
  </style>
</head>
<body>

  <div class="sidebar">
    <!-- Kosong seperti di Figma -->
  </div>

  <div class="main">
    <div class="section-title">Pengaturan Akun</div>
    <div class="card" onclick="showSubmenu('keamanan')">Keamanan & Akun <span class="arrow">></span></div>
    <div class="card">Alamat Saya <span class="arrow">></span></div>
    <div class="card">Pengaturan Notifikasi <span class="arrow">></span></div>
  </div>

  <div class="submenu" id="submenu">
    <div class="section-title">Keamanan & Akun</div>
    <div class="card">Username</div>
    <div class="card">No. Handphone</div>
    <div class="card">Email</div>
    <div class="card">Akun Media Sosial</div>
    <div class="card">Ganti Password</div>
  </div>

</body>
</html>
