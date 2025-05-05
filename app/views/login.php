<?php
// Proses login (sangat sederhana, hanya untuk contoh)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Dummy login
    if ($username === "admin" && $password === "1234") {
        $message = "Login berhasil!";
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
    <style>
        body {
            background-color: #fce5e5;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
            padding: 20px;
        }

        .chef-img {
            width: 150px;
            margin-bottom: 20px;
        }

        h2 {
            color: #cc5a5a;
            margin-bottom: 20px;
        }

        form input {
            width: 250px;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 10px;
        }

        form button {
            width: 270px;
            padding: 10px;
            background-color: #ec7a7a;
            border: none;
            border-radius: 10px;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .signup {
            margin-top: 10px;
            font-size: 12px;
        }

        .signup a {
            color: #6941c6;
            text-decoration: none;
        }

        .message {
            margin-top: 10px;
            color: #d8000c;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Ganti dengan gambar kamu -->
        <img src="/tribite/assets/img/login.png-removebg-preview.png" class="chef-img">

        <h2>Selamat Datang!</h2>

        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Login</button>
        </form>

        <?php if (!empty($message)): ?>
            <p class="message"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>

        <p class="signup">Belum punya akun? <a href="#">Daftar sekarang</a></p>
    </div>
</body>
</html>
