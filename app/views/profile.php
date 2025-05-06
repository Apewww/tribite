<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Pengguna</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #f8d4d4;
      color: #333;
    }

    .container {
      max-width: 60%;
      margin: 0 auto;
      padding: 20px 0;
    }

    .header {
      background-color: #ebb1b1;
      border-radius: 100px;
      margin-top: 20px;
      padding: 30px 0;
      text-align: center;
    }

    .profile-icon {
      background: #000;
      width: 150px;
      height: 150px;
      border-radius: 50%;
      margin: 0 auto 10px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .profile-icon i {
      font-size: 80px;
      color: white;
    }

    .username {
      font-weight: bold;
      font-size: 18px;
    }

    .user-contact {
      font-weight: bold;
      font-size: 14px;
    }

    .cards {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
      padding: 0 30px;
      gap: 5px;
    }

    .card {
      background: white;
      border-radius: 10px;
      padding: 10px;
      width: 30%;
      text-align: center;
      font-size: 12px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .card-icon {
      font-size: 24px;
      margin-bottom: 5px;
    }

    .card-label {
      font-weight: bold;
      color: #b94444;
    }

    .card-value {
      font-weight: bold;
      color: #b94444;
    }

    .menu {
      background-color: #ebb1b1;
      border-radius: 0px;
      margin-top: 30px;
      padding: 0 10px;
      padding-top: 30px;
     padding-bottom: 30px;
     width: 100%;
     height: 100%;
    }

    .menu-item, .logout {
      background: white;
      padding: 12px;
      margin: 6px 0;
      border-radius: 10px;
      text-align: center;
      font-weight: bold;
      font-size: 14px;
      color: #d15858;
      cursor: pointer;
    }

    .logout {
      margin: 40px auto 20px;
      width: 50%;
    }

    .menu-title {
      text-align: center;
      font-weight: bold;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <div class="profile-icon">
        <i class="fa-solid fa-circle-user"></i>
      </div>
      <div class="username">Nama Pengguna</div>
      <div class="user-contact">Email/telepon</div>
      <div class="cards">
        <div class="card">
          <div class="card-icon"><i class="fa-solid fa-wallet"></i></div>
          <div class="card-label">Bite Pay</div>
          <div class="card-value">Rp. 100.000</div>
        </div>
        <div class="card">
          <div class="card-icon"><i class="fa-solid fa-qrcode"></i></div>
          <div class="card-label">QR code</div>
        </div>
        <div class="card">
          <div class="card-icon"><i class="fa-solid fa-car"></i></div>
          <div class="card-label">Royalbites Point</div>
          <div class="card-value">500</div>
        </div>
      </div>
    </div>

    <div class="menu">
      <div class="menu-item">Alamat Saya</div>
      <div class="menu-item">Voucher saya</div>
      <div class="menu-item">Metode pembayaran</div>
      <div class="menu-item">bookmark</div>
      <div class="menu-item">Riwayat</div>
      <div class="menu-item">Bahasa</div>
      <div class="menu-item">Pengaturan Akun</div>
    </div>

    <div class="logout">Logout</div>
  </div>
</body>
</html>
