<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Promo Voucher</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #f8d4d4;
      color: #333;
    }

    .container {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
    }

    .header {
      display: flex;
      align-items: center;
      font-weight: bold;
      margin-bottom: 20px;
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
      padding: 10px;
      display: flex;
      align-items: center;
      margin-bottom: 15px;
    }

    .voucher-img {
      width: 50px;
      height: 50px;
      background-color: #fcdcdc;
      border-radius: 8px;
      margin-right: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
    }

    .voucher-content {
      flex: 1;
    }

    .voucher-title {
      font-size: 14px;
      font-weight: bold;
      margin-bottom: 6px;
    }

    .voucher-action {
      display: flex;
      justify-content: flex-end;
      align-items: center;
      margin-top: 5px;
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
  <div class="container">
    <div class="header">
      <i class="fas fa-arrow-left" onclick="window.history.back()"></i>
      <span>Promo Voucher</span>
    </div>
    <div class="divider"></div>

    <div class="voucher-card">
      <div class="voucher-img">🚲</div>
      <div class="voucher-content">
        <div class="voucher-title">DISKON 5% minimal belanja RP. 30.000</div>
        <div class="voucher-action">
          <button class="voucher-button">Pakai</button>
        </div>
      </div>
    </div>

    <div class="voucher-card">
      <div class="voucher-img">🚲</div>
      <div class="voucher-content">
        <div class="voucher-title">DISKON 10% minimal belanja RP. 30.000 menggunakan Bite Pay</div>
        <div class="voucher-action">
          <button class="voucher-button">Pakai</button>
        </div>
      </div>
    </div>

    <div class="voucher-card">
      <div class="voucher-img">📦</div>
      <div class="voucher-content">
        <div class="voucher-title">Gratis Ongkir minimal belanja RP. 30.000</div>
        <div class="voucher-action">
          <button class="voucher-button">Pakai</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
