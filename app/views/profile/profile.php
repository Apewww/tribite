<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php';
include PARTIALS_PATH . 'header.php';

$userId = $_SESSION['user']['id'];
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Handle upload foto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_picture'])) {
    $uploadDir = '/tribite/assets/img/upload/profile/';
    $fileName = $userId . '.' . pathinfo($_FILES['profile_picture']['name'], PATHINFO_EXTENSION);
    $uploadPath = $_SERVER['DOCUMENT_ROOT'] . $uploadDir . $fileName;

    if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $uploadPath)) {
        $dbPath = $uploadDir . $fileName;
        $stmt = $conn->prepare("UPDATE akun SET picture = ? WHERE id = ?");
        $stmt->bind_param("si", $dbPath, $userId);
        $stmt->execute();

        // $_SESSION['user']['picture'] = $dbPath;
        include AUTH;
        header("Location: /profile");
        exit;
    }
}

// Handle hapus foto
if (isset($_GET['hapus_foto'])) {
    $stmt = $conn->prepare("UPDATE akun SET picture = '' WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();

    $_SESSION['user']['picture'] = '';
    header("Location: /profile");
    exit;
}

$foto = $_SESSION['user']['picture'] ?: '/tribite/assets/img/default.png';
?>

<style>
    
    body {
        margin: 0;
        font-family: 'Poppins', sans-serif;
        background-color: #ebb1b1;
        color: #333;
    }

    .box {
        background-color: #fff;
        border-radius: 40px;
        padding: 30px 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        background: linear-gradient(to bottom right, #f8d7da, #f5c6cb);
        animation: fadeIn 0.8s ease both;
    }

    .box:hover {
        transform: translateY(-3px);
    }

    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeIn 0.8s ease forwards;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .profile-icon {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background-color: #000;
        overflow: hidden;
        position: relative;
        margin: 0 auto 10px;
        cursor: pointer;
    }

    .profile-icon i,
    .profile-icon img {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .profile-icon img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: none;
    }

    .dropdown-menu {
        text-align: center;
        font-family: 'Poppins', sans-serif;
        background-color: #ebb1b1;
        border-radius: 10px;
        padding: 10px 0;
        min-width: 150px;
    }

    .dropdown-menu a {
        display: block;
        padding: 8px 20px;
        color: #333;
        text-decoration: none;
        font-weight: 500;
        transition: background-color 0.3s ease;
    }

    .dropdown-menu a:hover {
        background-color: #f3a8a8;
    }

    .username {
        font-weight: bold;
        font-size: 20px;
        text-align: center;
    }

    .user-contact {
        font-size: 14px;
        color: #555;
        text-align: center;
    }

    .card-custom {
        background: white;
        border-radius: 10px;
        padding: 10px;
        text-align: center;
        font-size: 12px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, background-color 0.3s ease;
        cursor: pointer;
        height: 100%;
    }

    .card-custom:hover {
        transform: scale(1.05);
        background-color: #ffecec;
    }

    .header i {
        margin-right: 10px;
        cursor: pointer;
    }

    .card-icon {
        font-size: 24px;
        margin-bottom: 5px;
    }

    .card-label,
    .card-value {
        font-weight: bold;
        color: #b94444;
    }

    .menu-title {
        text-align: center;
        font-weight: bold;
        margin-bottom: 10px;
        font-size: 16px;
    }

    .menu-item,
    .logout {
        background: white;
        padding: 12px;
        margin: 6px 0;
        border-radius: 10px;
        text-align: center;
        font-weight: bold;
        font-size: 14px;
        color: #d15858;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
        text-decoration: none;
        display: block;
    }

    .menu-item:hover,
    .logout:hover {
        background-color: #f7c1c1;
        transform: scale(1.02);
    }

    .logout {
        margin-top: 30px;
        background-color: #fff0f0;
    }
</style>

    <div class="container-fluid px-3 px-md-5 mt-4">
         <div class="container-fluid py-4" style="background-color: #ebb1b1;">
        <a href="/home" style="text-decoration: none; color: inherit;">
            <i class="fas fa-arrow-left"></i>
            <span>Kembali</span>
        </a>
        </div>
        <!-- Profile Box -->
        <div class="box text-center fade-in">
            <div class="dropdown">
                <div class="profile-icon dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php if ($foto && $foto !== '/tribite/assets/img/default.png'): ?>
                        <img id="profileImage" src="<?= htmlspecialchars($foto) ?>" class="d-block" alt="Foto Profil" />
                    <?php else: ?>
                        <i class="fa-solid fa-circle-user fa-5x text-white" id="defaultIcon"></i>
                    <?php endif; ?>
                </div>
                <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                    <li>
                        <form method="post" enctype="multipart/form-data">
                            <input type="file" name="profile_picture" accept="image/*" onchange="this.form.submit()" style="display:none" id="uploadInput">
                            <a class="dropdown-item" href="#" onclick="document.getElementById('uploadInput').click()">Ubah Foto</a>
                        </form>
                    </li>
                    <?php if ($foto && $foto !== '/tribite/assets/img/default.png'): ?>
                        <li><a class="dropdown-item" href="/hapus_foto">Hapus Foto</a></li>
                    <?php endif; ?>
                </ul>
            </div>

            <div class="username"><?= htmlspecialchars($_SESSION['user']['nama']) ?></div>
            <div class="user-contact"><?= htmlspecialchars($_SESSION['user']['email']) ?></div>

            <div class="row text-center mt-3 g-2">
                <div class="col-12 col-md-4">
                    <div class="card-custom" onclick="toggleValue(this)">
                        <div class="card-icon"><i class="fa-solid fa-wallet"></i></div>
                        <div class="card-label">Bite Pay</div>
                        <div class="card-value" data-real="<?= htmlspecialchars($_SESSION['user']['bitepay']) ?>">***</div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card-custom" onclick="showQR()">
                        <div class="card-icon"><i class="fa-solid fa-qrcode"></i></div>
                        <div class="card-label">QR Code</div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card-custom" onclick="toggleValue(this)">
                        <div class="card-icon"><i class="fa-solid fa-car"></i></div>
                        <div class="card-label">Royalbites Point</div>
                        <div class="card-value" data-real="<?= htmlspecialchars($_SESSION['user']['point']) ?>">***</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menu Box -->
        <div class="box mt-4 fade-in" style="animation-delay: 0.3s;">
            <div class="menu-title">Menu</div>
            <div class="menu-item">Alamat Saya</div>
            <a href="/voucher" class="menu-item">Voucher Saya</a>
            <a href="/metodepembayaran" class="menu-item">Metode Pembayaran</a>
            <a href="/harian" class="menu-item">Absensi</a>
            <a href="/riwayat" class="menu-item">Riwayat</a>
            <a href="/bahasa" class="menu-item">Bahasa</a>
            <a href="/profile/settings/pengaturanakun" class="menu-item">Pengaturan Akun</a>
            <a href="/logout" class="logout">Logout</a>
        </div>
    </div>
</div>

<!-- QR Code Modal -->
<div class="modal fade" id="qrModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h5 class="modal-title w-100">QR Code Anda</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <img id="qrCodeImage" src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=<?= urlencode('UserID:'.$userId) ?>" 
                     alt="QR Code" class="img-fluid">
                <div class="mt-2">
                    <button class="btn btn-sm btn-outline-secondary" onclick="downloadQR()">
                        <i class="fas fa-download me-1"></i> Download
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showQR() {
        const qrImage = document.getElementById('qrCodeImage');
        qrImage.src = `https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=UserID:<?= $userId ?>`;
        new bootstrap.Modal(document.getElementById('qrModal')).show();
    }

    function downloadQR() {
        const link = document.createElement('a');
        link.href = document.getElementById('qrCodeImage').src;
        link.download = 'QRCode-<?= $userId ?>.png';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    function toggleValue(cardElement) {
        const valueElement = cardElement.querySelector('.card-value');
        valueElement.textContent = valueElement.textContent === '***' ? valueElement.dataset.real : '***';
    }
</script>
<?php include PARTIALS_PATH . 'footer.php'; ?>