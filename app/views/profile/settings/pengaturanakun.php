<?php
$pageTitle = "Pengaturan Akun";
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; 
include AUTH;
include PARTIALS_PATH . 'header.php';
session_start();
?>


<div class="container min-vh-100" id="PeganturanContent">
  <div class="position-relative py-3 border-bottom">
    <span class="position-absolute start-0 top-50 translate-middle-y ps-3 fw-semibold" style="cursor: pointer;" onclick="window.history.back()">
      <i class="fas fa-arrow-left me-2"></i> Kembali
    </span>
    <div class="text-center fw-bold fs-5">Keamanan & Akun</div>
  </div>
  
  <div>
    <a href="/profile/settings/keamanandanakun" class="settingakun-menu-item">Keamanan dan Akun</a>  
  </div>
  
  <div>
    <a href="/profile/settings/alamatsaya" class="settingakun-menu-item">Alamat Saya</a> 
  </div>
</div>


<?php
include PARTIALS_PATH . 'footer.php'; 
?> 
