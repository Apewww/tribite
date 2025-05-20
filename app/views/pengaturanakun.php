<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pengaturan Akun</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f5caca; /* warna pink dari Figma */
    }

    .container {
      display: flex;
      justify-content: center;
      padding: 20px;
      gap: 20px;
    }

    .card {
      background-color: white;
      width: 250px;
      border-radius: 8px;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .card h2 {
      background-color: white;
      margin: 0;
      padding: 15px;
      text-align: center;
      font-size: 18px;
      font-weight: bold;
      border-bottom: 1px solid #ccc;
    }

    .menu {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .menu li {
      padding: 15px;
      border-bottom: 1px solid #ccc;
      display: flex;
      justify-content: space-between;
      align-items: center;
      cursor: pointer;
    }

    .menu li:hover {
      background-color: #f0f0f0;
    }

    .arrow {
      font-weight: bold;
    }
  </style>
</head>
<body>

  <div class="container">
    <!-- Menu Pengaturan Akun -->
    <div class="card">
      <h2>Pengaturan Akun</h2>
      <ul class="menu">
        <li>Keamanan & Akun <span class="arrow">></span></li>
        <li>Alamat Saya <span class="arrow">></span></li>
        <li>Pengaturan Notifikasi <span class="arrow">></span></li>
      </ul>
    </div>
  </div>

</body>
</html>
