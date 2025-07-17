<?php
$pageTitle = "Voucher";
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; 
include AUTH;
include PARTIALS_PATH ."header.php";

session_start();

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

$currentDate = date('Y-m-d H:i:s');
$query = "SELECT * FROM kupon 
          WHERE status = 'aktif' 
          AND tanggal_mulai <= '$currentDate' 
          AND tanggal_berakhir >= '$currentDate'";
$result = $conn->query($query);
$kuponList = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $kuponList[] = $row;
    }
}
$conn->close();
?>

<style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #f8d4d4;
      color: #333;
    }

    .header {
      display: flex;
      align-items: center;
      font-weight: bold;
      margin-bottom: 20px;
      font-size: 18px;
    }

    .header i {
      margin-right: 10px;
      cursor: pointer;
    }

    .divider {
      border-bottom: 1px solid #333;
      margin-bottom: 20px;
    }

    .voucher-card {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      padding: 12px;
      display: flex;
      align-items: center;
      margin-bottom: 15px;
    }

    .voucher-img {
      width: 50px;
      height: 50px;
      background-color: #fcdcdc;
      border-radius: 8px;
      margin-right: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
    }

    .voucher-title {
      font-size: 14px;
      font-weight: bold;
      margin-bottom: 6px;
    }

    .voucher-button {
      background-color: #d15858;
      color: white;
      font-size: 12px;
      padding: 6px 12px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .voucher-button:hover {
      background-color: #b94444;
    }
  </style>

<body>
  <div class="container-fluid py-4">
    <a href="/profile" style="text-decoration: none; color: inherit;">
      <i class="fas fa-arrow-left"></i>
      <span>Kembali</span>
    </a>
    <div class="divider"></div>

    <?php if (empty($kuponList)): ?>
      <div class="alert alert-info">Tidak ada voucher yang tersedia saat ini</div>
    <?php else: ?>
      <?php foreach ($kuponList as $kupon): ?>
        <div class="voucher-card">
          <div class="voucher-img">
            <?= $kupon['tipe_diskon'] === 'persen' ? '🎁' : '💰' ?>
          </div>
          <div class="flex-grow-1">
            <div class="voucher-title">
              <?= htmlspecialchars($kupon['deskripsi']) ?>
              <small class="text-muted d-block">
                Berlaku hingga: <?= date('d M Y', strtotime($kupon['tanggal_berakhir'])) ?>
              </small>
            </div>
            <div class="d-flex justify-content-end">
              <button class="voucher-button" onclick="gunakanVoucher('<?= $kupon['kode'] ?>')">
                Pakai
              </button>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
  
  <script>
    function gunakanVoucher(kodeVoucher) {
      // Simpan voucher ke session atau langsung aplikasikan
      fetch('/apply_voucher.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ kode: kodeVoucher })
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          alert('Voucher berhasil digunakan!');
          window.location.href = '/checkout'; // Redirect ke halaman checkout
        } else {
          alert(data.message || 'Gagal menggunakan voucher');
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat menggunakan voucher');
      });
    }
  </script>
<?php
include PARTIALS_PATH . 'footer.php';
?>