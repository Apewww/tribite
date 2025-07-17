<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <title><?= $pageTitle ?? "Tribite"; ?></title>
    <link rel="icon" href="/tribite/assets/img/Logo.png" type="image/png">
    <link rel="stylesheet" href="/tribite/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/tribite/assets/css/global.css">
    <link rel="stylesheet" href="/tribite/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/tribite/assets/css/datatables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content text-center">
        <div class="modal-header">
          <h5 class="modal-title w-100" id="qrModalLabel">QR Code Anda</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=User123" alt="QR Code" class="img-fluid" />
        </div>
      </div>
    </div>
  </div>
</head>
<body>