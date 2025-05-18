<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Pilihan Bahasa</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #F5CFCF;
    }

    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
    }

    .header {
      display: flex;
      align-items: center;
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .back-arrow {
      font-size: 24px;
      margin-right: 10px;
      cursor: pointer;
    }

    .language-box {
      background-color: #fff;
      border: 1px solid #ccc;
      border-bottom: none;
      padding: 15px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      cursor: pointer;
    }

    .language-box:last-child {
      border-bottom: 1px solid #ccc;
      border-radius: 0 0 5px 5px;
    }

    .language-box:first-child {
      border-radius: 5px 5px 0 0;
    }

    .language-box:hover {
      background-color: #f0f0f0;
    }

    .checkmark {
      color: green;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <div class="container">
    <!-- Header -->
    <div class="header">
      <span class="back-arrow">&#8592;</span>
      <span id="title">Pilihan Bahasa</span>
    </div>

    <!-- Pilihan Bahasa -->
    <div class="language-box" onclick="selectLanguage('EN')">
      <span>English (EN)</span>
      <span id="check-en" class="checkmark" style="display: none;">✔</span>
    </div>

    <div class="language-box" onclick="selectLanguage('ID')">
      <span>Bahasa Indonesia (ID)</span>
      <span id="check-id" class="checkmark">✔</span>
    </div>
  </div>

  <script>
    function selectLanguage(lang) {
      // Ubah centang
      document.getElementById('check-en').style.display = lang === 'EN' ? 'inline' : 'none';
      document.getElementById('check-id').style.display = lang === 'ID' ? 'inline' : 'none';

      // Ubah teks judul
      const title = document.getElementById('title');
      if (lang === 'EN') {
        title.textContent = 'Language Selection';
      } else {
        title.textContent = 'Pilihan Bahasa';
      }

    }
  </script>

</body>
</html>
