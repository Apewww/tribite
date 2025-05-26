<?php
define('PARTIALS_PATH', $_SERVER['DOCUMENT_ROOT'] . "/tribite/app/views/components/");

$host = "localhost";
$user = "root";
$pass = "";
$db   = "tribite"; 

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}