<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profil Pengguna</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Font Awesome & Google Fonts -->
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
      max-width: 600px;
      margin: 40px auto;
      animation: fadeIn 0.6s ease-in-out;
    }

    .box {
      background-color: #ebb1b1;
      border-radius: 40px;
      padding: 30px 20px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      transition: transform 0.3s ease;
    }

    .box:hover {
      transform: translateY(-3px);
    }

    .profile-icon {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      overflow: hidden;
      background-color: #000;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0 auto 10px;
    }

    .profile-icon img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .upload-btn {
      margin: 10px auto;
      text-align: center;
    }

    .username {
      font-weight: bold;
      font-size: 20px;
      text-align: center;
    }

    .user-contact {
      font-size: 14px;
      color: #555;
      text-align: center;
    }

    .cards {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
      gap: 10px;
    }

    .card-custom {
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

    .card-custom:hover {
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
      text-decoration: none;
      display: block;
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

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>

  <div class="container">

    <!-- Profil Box -->
    <div class="box text-center">
      <div class="profile-icon" id="profileIcon">
        <i class="fa-solid fa-circle-user fa-5x text-white" id="defaultIcon"></i>
        <img id="profileImage" src="#" alt="Foto Profil" style="display:none;" />
      </div>
      <input type="file" accept="image/*" id="uploadInput" style="display: none;" />
      <div class="username">Nama Pengguna</div>
      <div class="user-contact">Email/Telepon</div>

      <div class="cards mt-3">
        <div class="card-custom">
          <div class="card-icon"><i class="fa-solid fa-wallet"></i></div>
          <div class="card-label">Bite Pay</div>
          <div class="card-value">Rp. 100.000</div>
        </div>
        <div class="card-custom">
          <div class="card-icon"><i class="fa-solid fa-qrcode"></i></div>
          <div class="card-label">QR Code</div>
        </div>
        <div class="card-custom">
          <div class="card-icon"><i class="fa-solid fa-car"></i></div>
          <div class="card-label">Royalbites Point</div>
          <div class="card-value">500</div>
        </div>
      </div>
    </div>

    <!-- Menu Box -->
    <div class="box mt-4">
      <div class="menu-title">Menu</div>
      <div class="menu-item">Alamat Saya</div>
      <a href="/voucher" class="menu-item">Voucher Saya</a>
      <div class="menu-item">Metode Pembayaran</div>
      <div class="menu-item">Bookmark</div>
      <div class="menu-item">Riwayat</div>
      <a href="/bahasa" class="menu-item">Bahasa</a>
      <a href="/pengaturanakun" class="menu-item">Pengaturan Akun</a>
      <div class="logout">Logout</div>
    </div>

  </div>

  <!-- Script upload foto -->
  <script>
  const uploadInput = document.getElementById('uploadInput');
  const profileImage = document.getElementById('profileImage');
  const defaultIcon = document.getElementById('defaultIcon');
  const profileIcon = document.getElementById('profileIcon');

  // Saat memilih file
  uploadInput.addEventListener('change', function () {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        profileImage.setAttribute('src', e.target.result);
        profileImage.style.display = 'block';
        defaultIcon.style.display = 'none';
      };
      reader.readAsDataURL(file);
    }
  });

  // Klik kanan pada foto profil untuk upload
  profileIcon.addEventListener('contextmenu', function (e) {
    e.preventDefault(); // Cegah menu klik kanan default
    uploadInput.click(); // Trigger input file
  });
</script>
</body>
</html>