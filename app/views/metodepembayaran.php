<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Metode Pembayaran</title>
  <!-- Link Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<style>
    body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #fce5e5;
    }

    .container {
    padding: 40px;
    max-width: 400px;
    margin: 0 auto;
    }

    h2 {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 20px;
    }

    .payment-box {
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    padding: 20px;
    }

    .payment-option {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 0;
    border-bottom: 1px solid #eee;
    }

    .payment-option:last-child {
    border-bottom: none;
    }

    .payment-option img {
    width: 24px;
    height: 24px;
    margin-right: 10px;
    }

    .payment-option span {
    flex-grow: 1;
    }

    .arrow {
    color: #555;
    font-weight: bold;
    }
</style>
<body>
    <div class="container py-4">
    <div class="header">
        <i class="fas fa-arrow-left cursor : pointer" onclick="window.history.back()"></i>
        <span>Kembali</span>
    </div>

  <div class="container">
    <h2>Metode Pembayaran</h2>
    <div class="payment-box">
      <div class="payment-option">
        <img src="/tribite/assets/img/bitepay.jpg" alt="BITEPAY">
        <span>BITEPAY</span>
      </div>
      <div class="payment-option">
        <img src="/tribite/assets/img/cod.png" alt="COD">
        <span>COD</span>
      </div>
      <div class="payment-option">
        <img src="/tribite/assets/img/qris.png" alt="QRIS">
        <span>QRIS</span>
      </div>
      <div class="payment-option">
        <img src="/tribite/assets/img/tfbank.jpg" alt="Transfer Bank">
        <span>Transfer Bank</span>
        <span class="arrow">&gt;</span>
      </div>
      <div class="payment-option">
        <img src="/tribite/assets/img/alfamart.png" alt="Alfamart">
        <span>Alfamart</span>
      </div>
      <div class="payment-option">
        <img src="/tribite/assets/img/indomart.png" alt="Indomaret">
        <span>Indomaret</span>
      </div>
    </div>
  </div>
  <!-- Link Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>