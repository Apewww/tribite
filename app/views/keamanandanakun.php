<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Keamanan & Akun</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      height: 100vh;
      width: 100vw
    }

    .container {
      background-color: #fddede; /* Warna pink */
      height: 100vh
      padding: 30px 20px;
    }

    .title {
      font-weight: bold;
      font-size: 1.2em;
      margin-bottom: 20px;
      text-align: center;
    }

    .row {
      color: black;
      text-decoration: none;
      background-color: white;
      border: 1px solid #ccc;
      padding: 12px 16px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 0.95em;
    }

    .row:not(:last-child) {
      border-bottom: none;
    }

    .link-row {
      cursor: pointer;
      transition: background-color 0.2s;
    }

    .link-row:hover {
      background-color: #f0f0f0;
    }

    .label {
      font-weight: regular;
    }

    .value {
      color: #333;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="title">Keamanan & Akun</div>

    <div class="row">
      <span class="label">Username</span>
      <span class="value">tribite03</span>
    </div>
    <div class="row">
      <span class="label">No. Handphone</span>
      <span class="value">****90</span>
    </div>
    <div class="row">
      <span class="label">Email</span>
      <span class="value">t********e@gmail.com</span>
    </div>
    <div>
    <a href="/akunsosialmedia" class="row link-row" onclick="window.location.href='akunsosialmedia.html'">Akun Sosial Media</a>
    <a href="/gantipassword" class="row link-row" onclick="window.location.href='gantipassword.html'">Ganti Password</a> 
    </div>
  </div>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
