<?php
$pageTitle = "Akun Management";
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; 
include PARTIALS_PATH . 'header.php';

session_start();
if ($_SESSION['user']['nama']) {
    $username = $_SESSION['user']['nama'];
} else {
    header('Location: login');
    exit;
}

// $stmt = $conn->prepare("CALL GetAkun");
// $stmt->execute();
// $result = $stmt->get_result();
// $akun = [];
// if ($result->num_rows >= 1) {
//     while ($row = $result->fetch_assoc()) {
//         $akun[] = $row;
//     }
// } else {
//     $_SESSION['notif'] = ["Warn", "Akun tidak ditemukan!"];
// }
// $stmt->close();
// $conn->close();

// echo '<pre>';
// print_r($akun);
// echo '</pre>';
?>


<div class="container-fluid">
    <div class="row">
        <?php include PARTIALS_PATH . 'sidebar.php'; ?>
        <div class="col">
            <div class="container mt-4">
                <h1>Dashboard</h1>
                <p>Halaman Dashboard.</p>
            </div>
        </div>
    </div>
</div>

<?php
include PARTIALS_PATH . 'footer.php'; 
?> 
