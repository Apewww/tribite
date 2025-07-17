<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php';
include PARTIALS_PATH . 'header.php';
?>

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #ebb1b1;
      color: #333;
    }

     .reservasi-box {
      background: linear-gradient(to bottom right, #f8d7da, #f5c6cb);
      padding: 30px 20px;
      border-radius: 30px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      margin: auto;
      animation: fadeIn 0.5s ease;
    } 

    .form-label {
      font-weight: 500;
    }

    .btn-submit {
      background-color: #d15858;
      color: white;
      font-weight: bold;
      border-radius: 50px;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-submit:hover {
      background-color: #b94444;
      transform: scale(1.03);
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .form-icon {
      margin-right: 8px;
      color: #b94444;
    }

    /* Responsive tweaks */
    @media (max-width: 576px) {
      .reservasi-box {
        padding: 20px 15px;
        border-radius: 20px;
      }
    }
  </style>
</head>
<body>

  <div class="container-fluid py-5">
  <div class="container-fluid py-4" style="background-color: #ebb1b1;">
        <a href="/profile" style="text-decoration: none; color: inherit;">
            <i class="fas fa-arrow-left"></i>
            <span>Kembali</span>
        </a>
        </div>
        <div class="container-fluid reservasi-box">
    <h3 class="text-center fw-bold mb-4">Reservasi Meja Online</h3>
    <form id="reservasiForm" aria-label="Formulir reservasi meja">
      <div class="row g-3">
        <div class="col-12">
          <label for="nama" class="form-label"><i class="fa fa-user form-icon"></i>Nama Lengkap</label>
          <input type="text" class="form-control" id="nama" name="nama" 
                 placeholder="Masukkan nama Anda" required autofocus
                 value="<?= isset($_SESSION['user']['nama_lengkap']) ? htmlspecialchars($_SESSION['user']['nama_lengkap']) : '' ?>">
        </div>
        <div class="col-12 col-md-6">
          <label for="tanggal" class="form-label"><i class="fa fa-calendar-alt form-icon"></i>Tanggal</label>
          <input type="date" class="form-control" id="tanggal" name="tanggal" 
                 min="<?= date('Y-m-d'); ?>" required
                 value="<?= date('Y-m-d'); ?>">
        </div>
        <div class="col-12 col-md-6">
          <label for="waktu" class="form-label"><i class="fa fa-clock form-icon"></i>Waktu</label>
          <input type="time" class="form-control" id="waktu" name="waktu" 
                 min="10:00" max="21:00" step="1800" required
                 value="<?= date('H:00', strtotime('+1 hour')); ?>">
        </div>
        <div class="col-12">
          <label for="jumlah" class="form-label"><i class="fa fa-users form-icon"></i>Jumlah Orang</label>
          <select class="form-control" id="jumlah" name="jumlah" required>
            <option value="">Pilih jumlah</option>
            <?php for($i=1; $i<=10; $i++): ?>
              <option value="<?= $i ?>"><?= $i ?> Orang</option>
            <?php endfor; ?>
            <option value="11">Lebih dari 10 Orang (Hubungi Kami)</option>
          </select>
        </div>
        <div class="col-12">
          <label for="catatan" class="form-label"><i class="fa fa-pen form-icon"></i>Catatan (Opsional)</label>
          <textarea class="form-control" id="catatan" name="catatan" rows="2" 
                    placeholder="Contoh: Meja dekat jendela, ada anak kecil, dll."></textarea>
        </div>
        <div class="col-12 text-center mt-3">
          <button type="submit" class="btn btn-submit px-4 py-2">Kirim Reservasi</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
document.getElementById('reservasiForm').addEventListener('submit', async function(e) {
  e.preventDefault();
  
  // Tampilkan loading indicator
  const submitBtn = this.querySelector('button[type="submit"]');
  submitBtn.disabled = true;
  submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...';
  
  try {
    const formData = new FormData(this);
    const response = await fetch('reservasi.php', {
      method: 'POST',
      body: formData
    });
    
    const result = await response.json();
    
    if (result.success) {
      // Tampilkan toast notifikasi
      const toast = new bootstrap.Toast(document.getElementById('toastReservasi'));
      toast.show();
      
      // Redirect ke reservasimenu.php setelah 1 detik
      setTimeout(() => {
        window.location.href = 'reservasimenu?success=1&kode=' + encodeURIComponent(result.kode_booking);
      }, 1000);
    } else {
      alert(result.message);
      submitBtn.disabled = false;
      submitBtn.innerHTML = 'Kirim Reservasi';
    }
  } catch (error) {
    console.error('Error:', error);
    alert('Terjadi kesalahan saat mengirim reservasi');
    submitBtn.disabled = false;
    submitBtn.innerHTML = 'Kirim Reservasi';
  }
});
</script>
<script>
document.getElementById('reservasiForm').addEventListener('submit', async function(e) {
  e.preventDefault();
  
  const formData = new FormData(this);
  const response = await fetch('reservasi', {
    method: 'POST',
    body: formData
  });
  
  const result = await response.json();
  
  if (result.success) {
    const toast = new bootstrap.Toast(document.getElementById('toastReservasi'));
    toast.show();
    
    setTimeout(() => {
      window.location.href = 'reservasimenu.php?success=1&kode=' + result.kode_booking;
    }, 2000);
  } else {
    alert(result.message);
  }
});

</script>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="toastReservasi" class="toast align-items-center text-white bg-success border-0" role="alert">
    <div class="d-flex">
      <div class="toast-body">Reservasi berhasil dikirim!</div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
    </div>
  </div>
</div>

<?php include PARTIALS_PATH . 'footer.php'; ?>