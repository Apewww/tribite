<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Reservasi Meja Online</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Font Awesome & Google Fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #ebb1b1;
      color: #333;
    }

    .reservasi-box {
      background: linear-gradient(to bottom right, #f8d7da, #f5c6cb);
      border-radius: 30px;
      padding: 30px 20px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      max-width: 600px;
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

  <div class="container py-5">
    <div class="reservasi-box">
      <h3 class="text-center fw-bold mb-4">Reservasi Meja Online</h3>
      <form id="reservasiForm" onsubmit="handleReservasi(event)" aria-label="Formulir reservasi meja">
        <div class="row g-3">
          <div class="col-12">
            <label for="nama" class="form-label"><i class="fa fa-user form-icon"></i>Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" placeholder="Masukkan nama Anda" required autofocus />
          </div>
          <div class="col-12 col-md-6">
            <label for="tanggal" class="form-label"><i class="fa fa-calendar-alt form-icon"></i>Tanggal</label>
            <input type="date" class="form-control" id="tanggal" min="<?= date('Y-m-d'); ?>" required />
          </div>
          <div class="col-12 col-md-6">
            <label for="waktu" class="form-label"><i class="fa fa-clock form-icon"></i>Waktu</label>
            <input type="time" class="form-control" id="waktu" required />
          </div>
          <div class="col-12">
            <label for="jumlah" class="form-label"><i class="fa fa-users form-icon"></i>Jumlah Orang</label>
            <input type="number" class="form-control" id="jumlah" min="1" placeholder="Misal: 4" required />
          </div>
          <div class="col-12">
            <label for="catatan" class="form-label"><i class="fa fa-pen form-icon"></i>Catatan (Opsional)</label>
            <textarea class="form-control" id="catatan" rows="2" placeholder="Contoh: Meja dekat jendela..."></textarea>
          </div>
          <div class="col-12 text-center mt-3">
            <button type="submit" class="btn btn-submit px-4 py-2">Kirim Reservasi</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Toast -->
  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="toastReservasi" class="toast align-items-center text-white bg-success border-0" role="alert">
      <div class="d-flex">
        <div class="toast-body">Reservasi berhasil dikirim!</div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function handleReservasi(event) {
      event.preventDefault();
      const toast = new bootstrap.Toast(document.getElementById('toastReservasi'));
      toast.show();
      document.getElementById('reservasiForm').reset();
    }
  </script>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function handleReservasi(event) {
      event.preventDefault();
      const nama = document.getElementById('nama').value;
      const tanggal = document.getElementById('tanggal').value;
      const waktu = document.getElementById('waktu').value;
      const jumlah = document.getElementById('jumlah').value;
      const catatan = document.getElementById('catatan').value;

      alert(`Reservasi berhasil!\n\nNama: ${nama}\nTanggal: ${tanggal}\nWaktu: ${waktu}\nJumlah Orang: ${jumlah}\nCatatan: ${catatan}`);
      document.getElementById('reservasiForm').reset();
    }
  </script>
</body>
</html>