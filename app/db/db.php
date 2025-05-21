<?php
$host = "localhost";     // atau 127.0.0.1
$username = "root";      // sesuaikan dengan username MySQL kamu
$password = "";          // kosongkan jika tidak ada password
$database = "tribite";    // ganti dengan nama database kamu

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
echo "Koneksi berhasil!";

if (isset($_POST['submit'])) {
    // Ambil data dari form
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];

    // Cek koneksi
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Query untuk insert data
    $sql = "INSERT INTO akun (username, password, email, telepon) 
            VALUES ('$username', '$password', '$email', '$telepon')";

    // Eksekusi query
    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil disimpan!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Tutup koneksi
    mysqli_close($conn);
}
?>


<!-- simpan sebagai input_akun.php -->
<form action="db" method="POST">
    <label>Username:</label><br>
    <input type="text" name="username"><br>
    <label>Password:</label><br>
    <input type="password" name="password"><br>
    <label>Email:</label><br>
    <input type="email" name="email"><br>
    <label>Telepon:</label><br>
    <input type="text" name="telepon"><br><br>
    <input type="submit" name="submit" value="Simpan">
</form>

username: rafly
password: 123
email: rafly@gmail.com
telepon: 08123456789
submit

POST