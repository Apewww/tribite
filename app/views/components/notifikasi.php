<div class="alert <?php echo ($headMessage == "System") ? "alert-success" : "alert-danger"; ?> d-flex align-items-center shadow-sm" role="alert" style="max-width: 400px;">
  <img src="/tribite/assets/img/Logo.png" alt="Logo" width="40" height="40" class="me-3">
  <div>
    <strong><?= htmlspecialchars($headMessage) ?></strong><br>
    <?= nl2br(htmlspecialchars($message)) ?>
  </div>
</div>
