<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form Alamat</title>
  <!-- Link Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="alamat-style.css">
</head>
<style>
    body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #fce5e5;
    }

    .alamat-container {
    max-width: 400px;
    margin: 0 auto;
    background-color: #ffffff;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .header {
    background-color: #f5cccc;
    padding: 15px;
    border-bottom: 1px solid #ddd;
    }

    .header h2 {
    margin: 0;
    font-size: 16px;
    font-weight: bold;
    }

    .form-content {
    padding: 20px;
    display: flex;
    flex-direction: column;
    }

    label {
    font-size: 14px;
    margin-top: 15px;
    margin-bottom: 5px;
    font-weight: 500;
    }

    input[type="text"] {
    border: none;
    border-bottom: 1px solid #000;
    padding: 5px 0;
    font-size: 14px;
    width: 100%;
    outline: none;
    }

    .select-line {
    border-bottom: 1px solid #000;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 5px 0;
    font-size: 14px;
    }

    .arrow {
    font-weight: bold;
    color: #000;
    }

</style>
<body>
  <div class="alamat-container">
    <div class="header">
      <h2>Alamat</h2>
    </div>
    <form class="form-content">
      <label>Nama Lengkap</label>
      <input type="text" placeholder="">

      <label>Nomor Telepon</label>
      <input type="text" placeholder="">

      <label>Provinsi</label>
      <div class="select-line">
        <select>
          <option value="Jawa Barat">Jawa Barat</option>
          <option value="Jawa Tengah">Jawa Tengah</option>
          <option value="Jawa Timur">Jawa Timur</option>
        </select>
      </div>

      <label>Kota</label>
      <div class="select-line">
        <select>
          <option value="Kota Cimahi">Kota Cimahi</option>
          <option value="Kota Sukabumi">Kota Sukabumi</option>
          <option value="Kota Bogor">Kota Bogor</option>
          <option value="Kota Bandung">Kota Bandung</option>
          <option value="Kabupaten Bandung">Kabupaten Bandung</option>
        </select>
      </div>

      <label>Kecamatan</label>
      <div class="select-line">
        <select>
          <option value="Cimahi Selatan">Cimahi Selatan</option>
          <option value="Cimahi Utara">Cimahi Utara</option>
          <option value="Cimahi Tengah">Cimahi Tengah</option>
        </select>
      </div>

      <label>Kode Pos</label>
      <div class="select-line">
        <select>
          <option value="40521">40521</option>
          <option value="40522">40522</option>
          <option value="40523">40523</option>
        </select>
      </div>

      <label>Nama Jalan, Gedung, No. Rumah</label>
      <input type="text" placeholder="">

      <input type="submit" name="submit" value="Simpan Alamat" class="btn btn-danger mt-3">
    </form>
  </div>
  <!-- Link Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>