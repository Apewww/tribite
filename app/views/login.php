<?php
$pageTitle = "Login";
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; 
include PARTIALS_PATH . 'header.php';
session_start();

if (isset($_SESSION['user']['nama'])) {
    header('Location: dashboard');
    exit;
} 

if (isset($_POST['login'])) {
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  
    $stmt = $conn->prepare("CALL GetLogin(?)");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if(password_verify($password,$user['password'])) {
            $_SESSION['user'] = $user;
            header("Location: /dashboard");
            exit;
        } else {
            $_SESSION['notif'] = ["Warn", "Password Salah!"];
        }
    } else {
        $_SESSION['notif'] = ["Warn", "Akun tidak ditemukan!"];
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

<div class="d-flex justify-content-center align-items-center auth-body" id="loginContent">
    <div class="container login-box text-center bg-white rounded-4 shadow p-4">
        <img src="/tribite/assets/img/login.png-removebg-preview.png" alt="Login Image" class="chef-img mb-3">

        <h2 class="text-danger mb-3">Selamat Datang!</h2>

        <form method="POST" action="login">
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" name="login" class="btn btn-danger w-100">Login</button>
        </form>

        <div class="mt-3">
          <p class="small mb-1">Belum punya akun? <a href="/register" class="text-decoration-none">Daftar sekarang</a></p>
          <p class="small">Kembali ke <a href="/home" class="text-decoration-none">Kembali</a></p>
        </div>

    </div>
</div>

</div>


<?php
include PARTIALS_PATH . 'footer.php'; 
?> 
