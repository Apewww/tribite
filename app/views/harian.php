<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php';
$akun_id = $_SESSION['user']['id'];
$hari_ini = date('Y-m-d');
$nama_hari = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
$poin_hari = [150, 50, 60, 60, 100, 100, 150]; // Minggu - Sabtu

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
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Absensi Horizontal - Tribite</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f9fbfe;
      font-family: 'Segoe UI', sans-serif;
    }
    .card {
      border: none;
      border-radius: 18px;
      box-shadow: 0 6px 12px rgba(0,0,0,0.08);
    }
    .avatar {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      object-fit: cover;
    }
    .absen-box {
      min-width: 100px;
      padding: 12px;
      margin: 5px;
      border-radius: 12px;
      text-align: center;
      background: #e9ecef;
      transition: 0.3s;
    }
    .absen-box.today {
      background: #d1e7dd;
      font-weight: bold;
      border: 2px solid #198754;
    }
    .absen-status {
      font-size: 24px;
    }
    .scroll-row {
      overflow-x: auto;
      white-space: nowrap;
    }
  </style>
</head>
<body>
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-9">
      <div class="card p-4 text-center">
        <img src="https://i.pravatar.cc/100?u=<?=$akun_id?>" class="avatar mb-3" alt="avatar">
        <h4><?= $_SESSION['user']['nama']?></h4>
        <p class="text-muted">Total Poin Mingguan: <strong><?=$total_poin?></strong></p>

        <div class="scroll-row d-flex justify-content-between mt-4 mb-3">
          <?php foreach ($data_absen as $absen): ?>
            <div class="absen-box <?= $absen['highlight'] ? 'today' : '' ?>">
              <div class="text-muted small"><?=$absen['hari']?></div>
              <div class="fw-semibold"><?=date('d M', strtotime($absen['tanggal']))?></div>
              <div class="absen-status"><?=$absen['status']?></div>
            </div>
          <?php endforeach; ?>
        </div>

        <?php if (!$sudah_absen): ?>
          <form action="/proses_absen" method="post" class="mt-3">
            <button class="btn btn-success" type="submit" >Absen Hari Ini</button>
          </form>
        <?php else: ?>
          <div class="alert alert-success mt-3 mb-0">Kamu sudah absen hari ini 🎉</div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
</body>
</html>