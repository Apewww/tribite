<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Formulir Daftar</title>
  <style>
    body {
      background-color: #fce6e2;
      font-family: sans-serif;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 400px;
      margin: auto;
      padding: 2rem;
    }

    .back-btn {
      background: none;
      border: none;
      font-size: 1.5rem;
      cursor: pointer;
    }

    h1 {
      font-weight: bold;
      margin-bottom: 0.2rem;
    }

    p {
      margin-top: 0;
      margin-bottom: 2rem;
    }

    .input-wrapper {
      position: relative;
      margin-bottom: 1.5rem;
    }

    .input-wrapper input {
      width: 100%;
      padding: 0.75rem;
      border: none;
      border-bottom: 2px solid #000;
      background: transparent;
      font-size: 1rem;
    }

    .input-wrapper .clear-btn {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-weight: bold;
      color: #333;
    }

    .input-wrapper .prefix {
      position: absolute;
      left: 5px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 0.9rem;
      background: #eee;
      padding: 0.25rem 0.5rem;
      border-radius: 10px;
    }

    .input-wrapper input.with-prefix {
      padding-left: 60px;
    }

    .submit-btn {
      width: 100%;
      padding: 1rem;
      background-color: #ea6e6e;
      border: none;
      color: white;
      font-weight: bold;
      font-size: 1rem;
      border-radius: 1rem;
      cursor: pointer;
    }

    label {
      display: block;
      margin-bottom: 0.3rem;
      font-weight: 500;
    }
  </style>
</head>
<body>
  <div class="container">
    <button class="back-btn">&#8592;</button>
    <h1>Daftar</h1>
    <p>Lengkapi data dirimu dibawah ini!</p>
    <form onsubmit="event.preventDefault()">
      <label>Nama Lengkap</label>
      <div class="input-wrapper">
        <input type="text" placeholder="Masukkan nama lengkap" id="nama" />
        <span class="clear-btn" onclick="document.getElementById('nama').value=''">x</span>
      </div>

      <label>Email</label>
      <div class="input-wrapper">
        <input type="email" placeholder="Masukkan email" id="email" />
        <span class="clear-btn" onclick="document.getElementById('email').value=''">x</span>
      </div>

      <label>Username</label>
      <div class="input-wrapper">
        <span class="prefix">🇮🇩 +62</span>
        <input type="text" placeholder="Masukkan nomor" id="username" class="with-prefix" />
        <span class="clear-btn" onclick="document.getElementById('username').value=''">x</span>
      </div>

      <button type="submit" class="submit-btn">Lanjutkan</button>
    </form>
  </div>
</body>
</html>
