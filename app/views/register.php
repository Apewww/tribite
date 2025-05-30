<?php
$pageTitle = "Register";
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; 
include PARTIALS_PATH . 'header.php';
session_start();

if (isset($_SESSION['user']['nama'])) {
    header('Location: dashboard');
    exit;
} 

if (isset($_POST['register'])) {
  $nama = htmlspecialchars(trim($_POST['nama']));
  $email = htmlspecialchars(trim($_POST['email']));
  $password = htmlspecialchars(trim($_POST['password']));
  $telcode = $_POST['countryCode'];
  $telepon = $_POST['phoneNumber'];
  $phone = $telcode . $telepon;

  // echo $nama;
  // echo $email;
  // echo $password;
  // echo $telcode . $telepon;
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  
  try {
    $stmt = $conn->prepare("CALL CreateAkun(?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nama, $email, $hashedPassword, $phone);
    $stmt->execute();

    $_SESSION['notif'] = ["System", "Akun berhasil dibuat!"];
    
  } catch (mysqli_sql_exception $e) {
    $_SESSION['notif'] = ["Error", $e->getMessage()];
  }

  $stmt->close();
  $conn->close();
}

if (isset($_SESSION['notif'])) {
  list($headMessage, $message) = $_SESSION['notif'];
  unset($_SESSION['notif']);
}
?>

<div style="position: fixed; top: 1rem; right: 1rem; z-index: 1050;" id="notif">
  <?php if (isset($headMessage) && isset($message)): ?>
    <?php include PARTIALS_PATH . 'notifikasi.php'; ?>
  <?php endif; ?>
</div>

<div class="d-flex justify-content-center align-items-center auth-body" id="registerContent">

  <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
    <div class="mb-3">
      <a href="/login" class="btn btn-link p-0 text-decoration-none">
        <i class="fa fa-arrow-left me-2"></i> Kembali
      </a>
    </div>
    
    <h1 class="h4 fw-bold mb-1">Daftar</h1>
    <p class="text-muted mb-4">Lengkapi data dirimu di bawah ini!</p>

    <form method="POST" action="register">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <div class="input-group">
          <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama lengkap" required>
          <button class="btn btn-outline-secondary" type="button" onclick="document.getElementById('nama').value=''">x</button>
        </div>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <div class="input-group">
          <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email" required>
          <button class="btn btn-outline-secondary" type="button" onclick="document.getElementById('email').value=''">x</button>
        </div>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <div class="input-group">
          <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password" required>
          <button class="btn btn-outline-secondary" type="button" onclick="document.getElementById('password').value=''">x</button>
        </div>
      </div>

      <div class="mb-3">
        <label for="phoneNumber" class="form-label">Nomor Telepon</label>
        <div class="input-group">
          <select class="form-select" name="countryCode" id="countryCode" style="max-width: 100px;">
            <option selected>+62</option>
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
          <input type="tel" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="8123456789" required>
          <button class="btn btn-outline-secondary" type="button" onclick="document.getElementById('phoneNumber').value=''">x</button>
        </div>
      </div>

      <div class="d-grid mt-4">
        <button type="submit" name="register" class="btn btn-danger">
          Submit
        </button>
      </div>
    </form>
  </div>
</div>
<script>
  setTimeout(() => {
    const notif = document.getElementById('notif');
    if (!notif) return;

    notif.classList.add('fade');

    notif.addEventListener('transitionend', () => {
      notif.remove();
    });

    setTimeout(() => notif.style.display = 'none', 300);
  }, 3000);
</script>

<?php
include PARTIALS_PATH . 'footer.php'; 
?> 
