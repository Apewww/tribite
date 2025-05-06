<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profil Pengguna</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #f8d4d4;
      color: #333;
    }

    .container {
      width: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px 0;
      animation: fadeIn 0.6s ease-in-out;
    }

    .box {
      width: 90%;
      max-width: 600px;
      background-color: #ebb1b1;
      border-radius: 40px;
      padding: 30px 20px;
      box-sizing: border-box;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      transition: transform 0.3s ease;
    }

    .box:hover {
      transform: translateY(-3px);
    }

    .header {
      text-align: center;
      margin-bottom: 20px;
    }

    .profile-icon {
      background: #000;
      width: 120px;
      height: 120px;
      border-radius: 50%;
      margin: 0 auto 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: transform 0.3s ease;
    }

    .profile-icon:hover {
      transform: scale(1.05);
    }

    .profile-icon i {
      font-size: 70px;
      color: white;
    }

    .username {
      font-weight: bold;
      font-size: 20px;
      margin-top: 5px;
    }

    .user-contact {
      font-size: 14px;
      color: #555;
    }

    .cards {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
      gap: 10px;
    }

    .card {
      background: white;
      border-radius: 10px;
      padding: 10px;
      flex: 1;
      text-align: center;
      font-size: 12px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      transition: transform 0.3s ease, background-color 0.3s ease;
      cursor: pointer;
    }

    .card:hover {
      transform: scale(1.05);
      background-color: #ffecec;
    }

    .card-icon {
      font-size: 24px;
      margin-bottom: 5px;
    }

    .card-label,
    .card-value {
      font-weight: bold;
      color: #b94444;
    }

    .menu {
      margin-top: 20px;
    }

    .menu-title {
      text-align: center;
      font-weight: bold;
      margin-bottom: 10px;
      font-size: 16px;
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
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .menu-item:hover,
    .logout:hover {
      background-color: #f7c1c1;
      transform: scale(1.02);
    }

    .logout {
      margin-top: 30px;
      background-color: #fff0f0;
    }

    @media (max-width: 768px) {
      .cards {
        flex-direction: column;
      }

      .card {
        width: 100%;
      }
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Header Box -->
    <div class="box header">
      <div class="profile-icon">
        <i class="fa-solid fa-circle-user"></i>
      </div>
      <div class="username">Nama Pengguna</div>
      <div class="user-contact">Email/Telepon</div>
      <div class="cards">
        <div class="card">
          <div class="card-icon"><i class="fa-solid fa-wallet"></i></div>
          <div class="card-label">Bite Pay</div>
          <div class="card-value">Rp. 100.000</div>
        </div>
        <div class="card">
          <div class="card-icon"><i class="fa-solid fa-qrcode"></i></div>
          <div class="card-label">QR Code</div>
        </div>
        <div class="card">
          <div class="card-icon"><i class="fa-solid fa-car"></i></div>
          <div class="card-label">Royalbites Point</div>
          <div class="card-value">500</div>
        </div>
      </div>
    </div>

    <!-- Menu Box -->
    <div class="box menu">
      <div class="menu-title">Menu</div>
      <div class="menu-item">Alamat Saya</div>
      <div class="menu-item">Voucher Saya</div>
      <div class="menu-item">Metode Pembayaran</div>
      <div class="menu-item">Bookmark</div>
      <div class="menu-item">Riwayat</div>
      <div class="menu-item">Bahasa</div>
      <div class="menu-item">Pengaturan Akun</div>
      <div class="logout">Logout</div>
    </div>
  </div>
</body>
</html>