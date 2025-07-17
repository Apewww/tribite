<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php';
include PARTIALS_PATH . 'header.php';
$akun_id = $_SESSION['user']['id'];
$hari_ini = date('Y-m-d');
$nama_hari = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
$poin_hari = [150, 50, 60, 60, 100, 100, 150];

$data_absen = [];
$result = mysqli_query($conn, "SELECT point FROM akun WHERE id = $akun_id");
$row = mysqli_fetch_assoc($result);
$total_poin = $row['point'];
for ($i = 6; $i >= 0; $i--) {
    $tgl = date('Y-m-d', strtotime("-$i days"));
    $hari = date('w', strtotime($tgl));
    $cek = mysqli_query($conn, "SELECT 1 FROM akun WHERE id = $akun_id AND date = '$tgl'");
    $absen = mysqli_num_rows($cek) > 0;
    $data_absen[] = [
        'tanggal' => $tgl,
        'hari' => $nama_hari[$hari],
        'status' => $absen ? '✔️' : '❌',
        'highlight' => $tgl == $hari_ini
    ];
}

$sudah_absen = mysqli_num_rows(mysqli_query($conn, "SELECT 1 FROM akun WHERE id = $akun_id AND date = '$hari_ini'")) > 0;
?>

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
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        background: linear-gradient(to bottom right, #f8d7da, #f5c6cb);
        animation: fadeIn 0.8s ease both;
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
        overflow: hidden;
        margin: 0 auto 10px;
    }

    .profile-icon img {
        width: 100%;
        height: 100%;
        object-fit: cover;
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

    .scroll-row {
        overflow-x: auto;
        white-space: nowrap;
        margin-top: 20px;
    }

    .absen-box {
        display: inline-block;
        min-width: 100px;
        padding: 15px;
        margin: 8px;
        border-radius: 20px;
        text-align: center;
        background: #fff;
        color: #b94444;
        font-weight: 600;
        transition: 0.3s ease;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.08);
    }

    .absen-box.today {
        background-color: #ffecec;
        border: 2px solid #b94444;
    }

    .absen-status {
        font-size: 24px;
        margin-top: 5px;
    }

    .btn-success {
        background-color: #b94444;
        border: none;
        padding: 10px 20px;
        font-weight: 600;
        border-radius: 10px;
    }

    .btn-success:hover {
        background-color: #a13c3c;
    }

    .alert-success {
        background-color: #d1e7dd;
        border: none;
        color: #0f5132;
        border-radius: 10px;
    }

    .py-4 ::before {
        cursor: pointer;
    }
  </style>
        
<div class="container py-5">
<div class="container py-4" style="background-color: #ebb1b1;">
        <a href="/profile" style="text-decoration: none; color: inherit;">
            <i class="fas fa-arrow-left"></i>
            <span>Kembali</span>
        </a>
        </div>
  <div class="container-fluid row justify-content-center">
    <div class="col-md-9">
      <div class="box fade-in text-center">
        <div class="profile-icon">
          <img src="tribite\assets\img\login.png-removebg-preview.png" alt="avatar">
        </div>
        <div class="username"><?= $_SESSION['user']['nama']?></div>
        <div class="user-contact">Total Poin Mingguan: <strong><?=$total_poin?></strong></div>

        <div class="scroll-row">
          <?php foreach ($data_absen as $absen): ?>
            <div class="absen-box <?= $absen['highlight'] ? 'today' : '' ?>">
              <div class="text-muted small"><?=$absen['hari']?></div>
              <div><?=date('d M', strtotime($absen['tanggal']))?></div>
              <div class="absen-status"><?=$absen['status']?></div>
            </div>
          <?php endforeach; ?>
        </div>

        <?php if (!$sudah_absen): ?>
          <form action="/proses_absen" method="post" class="mt-4">
            <button class="btn btn-success" type="submit">Absen Hari Ini</button>
          </form>
        <?php else: ?>
          <div class="alert alert-success mt-4">Kamu sudah absen hari ini 🎉</div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
</body>
</html>