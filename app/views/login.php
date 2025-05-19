<?php 
// Proses login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === "admin" && $password === "1234") {
        $message = "Login berhasil!";
        header("Location: /dashboard");
    } else {
        $message = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fce5e5;
            font-family: 'Poppins', sans-serif;
            height: 100vh;
        }
        .chef-img {
            width: 150px;
        }
        .login-box {
            max-width: 400px;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center">

    <div class="container login-box text-center bg-white rounded-4 shadow p-4">
        <img src="/tribite/assets/img/login.png-removebg-preview.png" alt="Login Image" class="chef-img mb-3">

        <h2 class="text-danger mb-3">Selamat Datang!</h2>

        <form method="POST" action="">
            <div class="mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-danger w-100">Login</button>
        </form>

        <?php if (!empty($message)): ?>
            <div class="alert alert-warning mt-3"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>

        <p class="mt-3 small">Belum punya akun? <a href="/register">Daftar sekarang</a></p>
    </div>

</body>
</html>
