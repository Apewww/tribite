<?php
define('PARTIALS_PATH', $_SERVER['DOCUMENT_ROOT'] . "/tribite/app/views/components/");
define('UPLOAD_PATH',  "/tribite/assets/img/upload/");
define('AUTH', $_SERVER['DOCUMENT_ROOT'] . "/tribite/app/views/auth/auth.php");

define('DB_HOST', 'localhost');
define('DB_NAME', 'tribite');
define('DB_USER', 'root');
define('DB_PASS', '');

define('DSN', 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME);


$host = "localhost";
$user = "root";
$pass = "";
$db   = "tribite"; 

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}