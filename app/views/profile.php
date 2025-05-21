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
      background-color: #ebb1b1;
      color: #333;
    }

    .box {
      background-color: #fff;
      border-radius: 40px;
      padding: 30px 20px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      background: linear-gradient(to bottom right, #f8d7da, #f5c6cb);
      animation: fadeIn 0.8s ease both;
    }

    .box:hover {
      transform: translateY(-3px);
    }

    .fade-in {
      opacity: 0;
      transform: translateY(20px);
      animation: fadeIn 0.8s ease forwards;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .profile-icon {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      background-color: #000;
      overflow: hidden;
      position: relative;
      margin: 0 auto 10px;
      cursor: pointer;
    }

    .profile-icon i,
    .profile-icon img {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .profile-icon img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: none;
    }

    .dropdown-menu {
      text-align: center;
      font-family: 'Poppins', sans-serif;
      background-color: #ebb1b1;
      border-radius: 10px;
      padding: 10px 0;
      min-width: 150px;
    }

    .dropdown-menu a {
      display: block;
      padding: 8px 20px;
      color: #333;
      text-decoration: none;
      font-weight: 500;
      transition: background-color 0.3s ease;
    }

    .dropdown-menu a:hover {
      background-color: #f3a8a8;
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

    .card-custom {
      background: white;
      border-radius: 10px;
      padding: 10px;
      text-align: center;
      font-size: 12px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      transition: transform 0.3s ease, background-color 0.3s ease;
      cursor: pointer;
      height: 100%;
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
  </style>
</head>
<body>

  <div class="container-fluid px-3 px-md-5 mt-4">
    <!-- Profil Box -->
    <div class="box text-center fade-in">
      <div class="dropdown">
        <div class="profile-icon dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-circle-user fa-5x text-white" id="defaultIcon"></i>
          <img id="profileImage" src="#" alt="Foto Profil" />
        </div>
        <ul class="dropdown-menu" aria-labelledby="profileDropdown">
          <li><a class="dropdown-item" href="#" onclick="uploadInput.click()">Ubah Foto</a></li>
          <li><a class="dropdown-item" href="#" onclick="hapusFoto()">Hapus Foto</a></li>
        </ul>
      </div>

      <input type="file" accept="image/*" id="uploadInput" style="display: none;" />

      <div class="username">Nama Pengguna</div>
      <div class="user-contact">Email/Telepon</div>

      <div class="row text-center mt-3 g-2">
        <div class="col-12 col-md-4">
          <div class="card-custom" onclick="toggleValue(this)">
            <div class="card-icon"><i class="fa-solid fa-wallet"></i></div>
            <div class="card-label">Bite Pay</div>
            <div class="card-value" data-real="Rp. 100.000">***</div>
          </div>
        </div>
        <div class="col-12 col-md-4">
          <div class="card-custom" onclick="showQR()">
            <div class="card-icon"><i class="fa-solid fa-qrcode"></i></div>
            <div class="card-label">QR Code</div>
          </div>
        </div>
        <div class="col-12 col-md-4">
          <div class="card-custom" onclick="toggleValue(this)">
            <div class="card-icon"><i class="fa-solid fa-car"></i></div>
            <div class="card-label">Royalbites Point</div>
            <div class="card-value" data-real="500">***</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Menu Box -->
    <div class="box mt-4 fade-in" style="animation-delay: 0.3s;">
      <div class="menu-title">Menu</div>
      <div class="menu-item">Alamat Saya</div>
      <a href="/voucher" class="menu-item">Voucher Saya</a>
      <a href="/metodepembayaran" class="menu-item">Metode Pembayaran</a>
      <div class="menu-item">Bookmark</div>
      <div class="menu-item">Riwayat</div>
      <a href="/bahasa" class="menu-item">Bahasa</a>
      <a href="/pengaturanakun" class="menu-item">Pengaturan Akun</a>
      <div class="logout">Logout</div>
    </div>
  </div>

  <!-- QR Code Modal -->
  <div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content text-center">
        <div class="modal-header">
          <h5 class="modal-title w-100" id="qrModalLabel">QR Code Anda</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=User123" alt="QR Code" class="img-fluid" />
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS & Script Upload Foto -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const uploadInput = document.getElementById('uploadInput');
    const profileImage = document.getElementById('profileImage');
    const defaultIcon = document.getElementById('defaultIcon');

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

    function hapusFoto() {
      profileImage.setAttribute('src', '#');
      profileImage.style.display = 'none';
      defaultIcon.style.display = 'block';
    }

    function toggleValue(cardElement) {
      const valueElement = cardElement.querySelector('.card-value');
      if (valueElement.textContent === '***') {
        valueElement.textContent = valueElement.dataset.real;
      } else {
        valueElement.textContent = '***';
      }
    }

    function showQR() {
      const qrModal = new bootstrap.Modal(document.getElementById('qrModal'));
      qrModal.show();
    }
  </script>
</body>
</html>