<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Pengaturan Akun</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .container {
      background-color: #fddede;
      padding: 30px 20px;
      width: 360px;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    .title {
      font-weight: bold;
      font-size: 1.3em;
      margin-bottom: 20px;
      text-align: center;
    }

    .menu-item {
      background-color: white;
      border: 1px solid #ccc;
      padding: 14px 16px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 1em;
      cursor: pointer;
      transition: background-color 0.2s;
    }

    .menu-item:hover {
      background-color: #f0f0f0;
    }

    .menu-item:not(:last-child) {
      border-bottom: none;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="title">Pengaturan Akun</div>

    <div class="menu-item" onclick="window.location.href='keamanan-akun.html'">
      Keamanan & Akun
      <span>&#9654;</span>
    </div>
    <div class="menu-item" onclick="window.location.href='alamat-saya.html'">
      Alamat Saya
      <span>&#9654;</span>
    </div>
    <div class="menu-item" onclick="window.location.href='pengaturan-notifikasi.html'">
      Pengaturan Notifikasi
      <span>&#9654;</span>
    </div>
  </div>
</body>
</html>
