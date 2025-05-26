<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Pengaturan Akun</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      height: 100vh;
      width: 100vw;
    }

    .container {
      background-color: #fddede;
      height: 100vh;
      padding: 30px 20px;
    }

    .title {
      font-weight: bold;
      font-size: 1.5em;
      text-align: center;
      margin-bottom: 30px;
    }

    .menu-item {
      background-color: white;
      border: 1px solid #ccc;
      padding: 18px 16px;
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
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="title">Pengaturan Akun</div>

    <div class="menu-item" onclick="window.location.href='keamanan-akun.html'">
      Keamanan & Akun
      
    </div>
    <div class="menu-item" onclick="window.location.href='alamat-saya.html'">
      Alamat Saya
      
    </div>
    <div class="menu-item" onclick="window.location.href='pengaturan-notifikasi.html'">
      Pengaturan Notifikasi
      
    </div>
  </div>
  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
