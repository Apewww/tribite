<?php
session_start();
$pageTitle = "Pengaturan Akun";
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; 
include AUTH;
include PARTIALS_PATH . 'header.php';
?>


<div class="container min-vh-100 d-flex" id="landingContent">
  <div class="title">Pengaturan Akun</div>
  <div>
    <a href="/keamanandanakun" class="menu-item" onclick="window.location.href='keamanan-akun.html'">Keamanan dan Akun</a>  
  </div>
  
  <div>
    <a href="/alamatsaya" class="menu-item" onclick="window.location.href='alamat-saya.html'">Alamat Saya</a> 
  </div>
</div>


<?php
include PARTIALS_PATH . 'footer.php'; 
?> 
