<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Formulir Daftar</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <style>
    body {
      background-color: #fce6e2;
      font-family: sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      background-color: #fff;
      border-radius: 10px;
      max-width: 400px;
      width: 100%;
      padding: 2rem;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .back-btn {
      background: none;
      border: none;
      font-size: 1.5rem;
      cursor: pointer;
    }

    h1 {
      font-weight: bold;
      margin-bottom: 0.5rem;
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
      width: 95%;
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

    .input-wrapper select {
      padding: 0.75rem 0.5rem 0.75rem 0;
      border: none;
      border-bottom: 2px solid #000;
      background: transparent;
      font-size: 1rem;
      outline: none;
    }

    .input-wrapper input[type="tel"] {
      padding: 0.75rem;
      border: none;
      border-bottom: 2px solid #000;
      background: transparent;
      font-size: 1rem;
      width: 100%;
      outline: none;
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
    <a href="/login">
      <button class="back-btn">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
      </button>
    </a>
    <h1>Daftar</h1>
    <p>Lengkapi data dirimu dibawah ini!</p>
    <form method="post" action="" onsubmit="event.preventDefault()">
      <label>Nama Lengkap</label>
      <div class="input-wrapper">
        <input type="text" placeholder="Masukkan nama lengkap" id="nama" required />
        <span class="clear-btn" onclick="document.getElementById('nama').value=''">x</span>
      </div>

      <label>Email</label>
      <div class="input-wrapper">
        <input type="email" placeholder="Masukkan email" id="email" required />
        <span class="clear-btn" onclick="document.getElementById('email').value=''">x</span>
      </div>

      <label>Password</label>
      <div class="input-wrapper">
        <input type="password" placeholder="Masukkan password" id="password" required />
        <span class="clear-btn" onclick="document.getElementById('password').value=''">x</span>
      </div>

      <label>Nomor Telepon</label>
      <div class="input-wrapper">
        <div style="display: flex; align-items: center;">
          <select id="countryCode">
            <option value="Indonesia">+62</option>
            <option value="Afghanistan">+93</option>
            <option value="Armenia">+374</option>
            <option value="Azerbaijan">+994</option>
            <option value="Bahrain">+973</option>
            <option value="Bangladesh">+880</option>
            <option value="Bhutan">+975</option>
            <option value="Brunei">+673</option>
            <option value="Cambodia">+855</option>
            <option value="China">+86</option>
            <option value="Cyprus">+357</option>
            <option value="Georgia">+995</option>
            <option value="India">+91</option>
            <option value="Indonesia">+62</option>
            <option value="Iran">+98</option>
            <option value="Iraq">+964</option>
            <option value="Israel">+972</option>
            <option value="Japan">+81</option>
            <option value="Jordan">+962</option>
            <option value="Kazakhstan">+7</option>
            <option value="Kuwait">+965</option>
            <option value="Kyrgyzstan">+996</option>
            <option value="Laos">+856</option>
            <option value="Lebanon">+961</option>
            <option value="Maldives">+960</option>
            <option value="Malaysia">+60</option>
            <option value="Mongolia">+976</option>
            <option value="Myanmar">+95</option>
            <option value="Nepal">+977</option>
            <option value="North Korea">+850</option>
            <option value="Oman">+968</option>
            <option value="Pakistan">+92</option>
            <option value="Palestine">+970</option>
            <option value="Philippines">+63</option>
            <option value="Qatar">+974</option>
            <option value="Saudi Arabia">+966</option>
            <option value="Singapore">+65</option>
            <option value="South Korea">+82</option>
            <option value="Sri Lanka">+94</option>
            <option value="Syria">+963</option>
            <option value="Taiwan">+886</option>
            <option value="Tajikistan">+992</option>
            <option value="Thailand">+66</option>
            <option value="Turkey">+90</option>
            <option value="Turkmenistan">+993</option>
            <option value="United Arab Emirates">+971</option>
            <option value="Uzbekistan">+998</option>
            <option value="Vietnam">+84</option>
            <option value="Yemen">+967</option>
          </select>
          <input type="tel" id="phoneNumber" placeholder="8123456789" style="flex: 1;" required />
        </div>
        <span class="clear-btn" onclick="document.getElementById('phoneNumber').value=''">x</span>
      </div>
      
      <button type="submit" class="submit-btn"><a href="/profile">Lanjutkan</a></button>
    </form>
  </div>
</body>
</html>