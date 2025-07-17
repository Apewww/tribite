<?php
$pageTitle = "Pengaturan Akun";
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; 
include AUTH;
include PARTIALS_PATH . 'header.php';
session_start();
?>


<div class="container min-vh-100" id="PeganturanContent">
  <div class="position-relative py-3 border-bottom">
    <a href="/profile" class="position-absolute start-0 top-50 translate-middle-y ps-3 fw-semibold text-decoration-none text-black" style="cursor: pointer;">
      <i class="fas fa-arrow-left me-2"></i> Kembali
    </a>
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
