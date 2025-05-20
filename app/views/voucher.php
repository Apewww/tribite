<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Promo Voucher</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Font & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #f8d4d4;
      color: #333;
    }

    .header {
      display: flex;
      align-items: center;
      font-weight: bold;
      margin-bottom: 20px;
      font-size: 18px;
    }

    .header i {
      margin-right: 10px;
      cursor: pointer;
    }

    .divider {
      border-bottom: 1px solid #333;
      margin-bottom: 20px;
    }

    .voucher-card {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      padding: 12px;
      display: flex;
      align-items: center;
      margin-bottom: 15px;
    }

    .voucher-img {
      width: 50px;
      height: 50px;
      background-color: #fcdcdc;
      border-radius: 8px;
      margin-right: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
    }

    .voucher-title {
      font-size: 14px;
      font-weight: bold;
      margin-bottom: 6px;
    }

    .voucher-button {
      background-color: #d15858;
      color: white;
      font-size: 12px;
      padding: 6px 12px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .voucher-button:hover {
      background-color: #b94444;
    }
  </style>
</head>
<body>

  <div class="container py-4">
    <div class="header">
      <i class="fas fa-arrow-left" onclick="window.history.back()"></i>
      <span>Promo Voucher</span>
    </div>
    <div class="divider"></div>

    <!-- Voucher 1 -->
    <div class="voucher-card">
      <div class="voucher-img">🚲</div>
      <div class="flex-grow-1">
        <div class="voucher-title">DISKON 5% minimal belanja RP. 30.000</div>
        <div class="d-flex justify-content-end">
          <button class="voucher-button">Pakai</button>
        </div>
      </div>
    </div>

    <!-- Voucher 2 -->
    <div class="voucher-card">
      <div class="voucher-img">🚲</div>
      <div class="flex-grow-1">
        <div class="voucher-title">DISKON 10% minimal belanja RP. 30.000 menggunakan Bite Pay</div>
        <div class="d-flex justify-content-end">
          <button class="voucher-button">Pakai</button>
        </div>
      </div>
    </div>

    <!-- Voucher 3 -->
    <div class="voucher-card">
      <div class="voucher-img">📦</div>
      <div class="flex-grow-1">
        <div class="voucher-title">Gratis Ongkir minimal belanja RP. 30.000</div>
        <div class="d-flex justify-content-end">
          <button class="voucher-button">Pakai</button>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>