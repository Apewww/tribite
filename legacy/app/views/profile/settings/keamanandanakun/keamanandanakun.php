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

<div class="container min-vh-100" id="KeamananAkunContent">
    <div class="position-relative py-3 border-bottom">
      <a href="/profile/settings/pengaturanakun" class="position-absolute start-0 top-50 translate-middle-y ps-3 fw-semibold text-decoration-none text-black" style="cursor: pointer;">
        <i class="fas fa-arrow-left me-2"></i> Kembali
      </a>
      <div class="text-center fw-bold fs-5">Keamanan & Akun</div>
    </div>

    <div class="border rounded bg-light p-3">
      <div style="cursor: pointer;" class="d-flex justify-content-between py-2 border-bottom" data-bs-toggle="modal" data-bs-target="#EditNama">
        <span class="fw-semibold">Username</span>
        <span class="text-muted"><?=  htmlspecialchars($_SESSION['user']['nama']) ?? 'Unknown'; ?></span>
      </div>
      <div style="cursor: pointer;" class="d-flex justify-content-between py-2 border-bottom" data-bs-toggle="modal" data-bs-target="#EditTelp">
        <span class="fw-semibold">No. Handphone</span>
        <span class="text-muted"><?=  htmlspecialchars($_SESSION['user']['telepon']) ?? 'Unknown'; ?></span>
      </div>
      <div style="cursor: pointer;" class="d-flex justify-content-between py-2" data-bs-toggle="modal" data-bs-target="#EditEmail">
        <span class="fw-semibold">Email</span>
        <span class="text-muted"><?=  htmlspecialchars($_SESSION['user']['email']) ?? 'Unknown'; ?></span>
      </div>
    </div>

    <div class="mt-3 text-center">
      <span style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#ChangePassword">
        <i class="fas fa-lock me-1"></i> Ganti Password
      </span>                                              
    </div>

</div>

<div class="modal fade" id="EditNama" tabindex="-1" aria-labelledby="EditNamaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="/profile/settings/changeusername">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="EditNama">Ganti Username</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
                <input type="text" name="namaBaru" class="form-control" placeholder="Username Baru" value="" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Change</button>
          </div>
        </div>
    </form>
  </div>
</div>

<div class="modal fade" id="EditTelp" tabindex="-1" aria-labelledby="EditTelpLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="/profile/settings/changetelp">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="EditTelp">Ganti No.Telepon</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
                <input type="tel" name="telpBaru" pattern="^\+?[0-9]{9,15}$" class="form-control" placeholder="No Telepon Baru" value="" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Change</button>
          </div>
        </div>
    </form>
  </div>
</div>

<div class="modal fade" id="EditEmail" tabindex="-1" aria-labelledby="EditEmailLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="/profile/settings/changeemail">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="EditEmail">Ganti Email</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
                <input type="email" name="emailBaru" class="form-control" placeholder="Email Baru" value="" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Change</button>
          </div>
        </div>
    </form>
  </div>
</div>

<div class="modal fade" id="ChangePassword" tabindex="-1" aria-labelledby="ChangePasswordLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="/profile/settings/changepassword">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="ChangePassword">Ganti Password</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
                <input type="password" name="passwordlama" class="form-control" placeholder="Password Lama" value="" required>
            </div>
            <div class="mb-3">
                <input type="password" name="passwordbaru" class="form-control" placeholder="Password Baru" value="" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Change</button>
          </div>
        </div>
    </form>
  </div>
</div>


<?php
include PARTIALS_PATH . 'footer.php'; 
?> 
