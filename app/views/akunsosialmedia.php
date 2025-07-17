<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Akun Sosial Media</title>
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
      width: 100vw;
    }

    .container {
      background-color: #fddede;
      height: 100vh;
      padding: 30px 20px;
    }

    .title {
      font-weight: bold;
      font-size: 1.2em;
      margin-bottom: 20px;
      text-align: center;
    }

    .card {
      background-color: white;
      border: 1px solid #ccc;
      border-radius: 6px;
      display: flex;
      align-items: center;
      padding: 12px 16px;
      margin-bottom: 10px;
      cursor: pointer;
      transition: background-color 0.2s;
    }

    .card:hover {
      background-color: #f0f0f0;
    }

    .card img {
      width: 20px;
      height: 20px;
      margin-right: 12px;
    }

    .card span {
      font-size: 0.95em;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="title">Akun Sosial Media</div>

    <div class="card" onclick="alert('Hubungkan ke Facebook')">
      <img src="https://upload.wikimedia.org/wikipedia/commons/0/05/Facebook_Logo_%282019%29.png" alt="Facebook">
      <span>Hubungkan Akun Facebook</span>
    </div>

    <div class="card" onclick="alert('Hubungkan ke Google')">
      <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" alt="Google">
      <span>Hubungkan Akun Google</span>
    </div>
  </div>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
