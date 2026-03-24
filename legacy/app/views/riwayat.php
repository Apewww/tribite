<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php';
include PARTIALS_PATH . 'header.php'; 
// echo "Requested URI: " . $uri;

?>


<div class="container py-3">

    <div class="d-flex align-items-center mb-2">
      <a href="/profile">
        <i class="fa fa-arrow-left text-black me-2" aria-hidden="true"></i>
      </a>
      <h5 class="mb-0 fw-bold">Riwayat</h5>
    </div>
    <hr class="my-2"/>

    <div class="bg-danger bg-opacity-25 rounded-pill px-3 py-2 d-flex justify-content-between align-items-center mb-3">
      <div class="d-flex align-items-center gap-2">
        <i class="bi bi-calendar-event"></i>
        <span class="fw-semibold small">21 mei 2025</span>
      </div>
      <div class="d-flex align-items-center gap-2">
        <span class="fw-bold small">Rp.30.000,00</span>
        <span class="fw-bold small">V</span>
      </div>
    </div>

    <div class="bg-danger bg-opacity-25 rounded-pill py-3 mb-3"></div>

    <div class="bg-danger bg-opacity-25 rounded-pill py-3"></div>

  </div>


<?php
include PARTIALS_PATH . 'footer.php';
?> 
