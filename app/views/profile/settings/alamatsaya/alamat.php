<?php
$pageTitle = "Keamanan dan Akun";
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; 
include AUTH;
include PARTIALS_PATH . 'header.php';
session_start();

if (isset($_SESSION['notif'])) {
  list($headMessage, $message) = $_SESSION['notif'];
  unset($_SESSION['notif']);
}
?>

<div style="position: fixed; top: 1rem; right: 1rem; z-index: 1050;" id="notif">
  <?php if (isset($headMessage) && isset($message)): ?>
    <?php include PARTIALS_PATH . 'notifikasi.php'; ?>
  <?php endif; ?>
</div>

<div class="container min-vh-100" id="AlamatSayaContent">
<div class="container my-5">
  <div class="position-relative py-3">
    <a href="/profile/settings/pengaturanakun" class="position-absolute start-0 top-50 translate-middle-y ps-3 fw-semibold text-decoration-none text-black" style="cursor: pointer;">
      <i class="fas fa-arrow-left me-2"></i> Kembali
    </a>
    <div class="text-center fw-bold fs-5">Alamat Saya</div>
  </div>  
  <div class="card mx-auto shadow-sm" style="max-width: 500px;">
    <div class="card-header bg-danger text-white">
      <h5 class="mb-0">Ganti Alamat</h5>
    </div>
    <div class="card-body">
      <form action="/profile/settings/alamatsaya/changealamat" method="POST">

        <div class="form-group">
          <label for="alamat">Alamat Lengkap</label>
          <textarea class="form-control" name="alamatBaru" rows="4" 
          placeholder="<?= $_SESSION['user']['alamat'] ?? '' ?>"></textarea>
        </div>

        <button type="submit" class="btn btn-danger btn-block mt-3 w-100">Simpan Alamat</button>
      </form>
    </div>
  </div>
</div>
</div>

<?php
include PARTIALS_PATH . 'footer.php'; 
?> 
