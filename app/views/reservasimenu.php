<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php';
include PARTIALS_PATH . 'header.php';

// Koneksi database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data reservasi
$userId = $_SESSION['user']['id'];
$query = "SELECT * FROM reservasi WHERE user_id = ? ORDER BY tanggal DESC, jam_mulai DESC";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$reservations = $result->fetch_all(MYSQLI_ASSOC);

// Handle pembatalan reservasi
if (isset($_POST['cancel_reservation'])) {
    $reservationId = $_POST['reservation_id'];
    $updateQuery = "UPDATE reservasi SET status = 'dibatalkan' WHERE id = ? AND user_id = ?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param("ii", $reservationId, $userId);
    $updateStmt->execute();
    
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<style>
    .reservation-container {
        max-width: 1200px;
        margin: 30px auto;
        padding: 0 15px;
    }
    
    .header-section {
        margin-bottom: 30px;
        text-align: center;
    }
    
    .header-section h2 {
        color: #b94444;
        font-weight: bold;
    }
    
    .filter-section {
        background: white;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 30px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        background: linear-gradient(to bottom right, #f8d7da, #f5c6cb);
    }
    
    #reservationList {
        display: grid;
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .reservation-card {
        background: white;
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        background: linear-gradient(to bottom right, #fff, #ffecec);
    }
    
    .reservation-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    }
    
    .reservation-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        border-bottom: 1px solid #f3a8a8;
        padding-bottom: 10px;
    }
    
    .reservation-title {
        font-size: 18px;
        font-weight: bold;
        color: #b94444;
        margin: 0;
    }
    
    .reservation-status {
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
        text-transform: capitalize;
    }
    
    .status-menunggu {
        background-color: #fff3cd;
        color: #856404;
    }
    
    .status-dikonfirmasi {
        background-color: #d4edda;
        color: #155724;
    }
    
    .status-selesai {
        background-color: #cce5ff;
        color: #004085;
    }
    
    .status-dibatalkan {
        background-color: #f8d7da;
        color: #721c24;
    }
    
    .reservation-details {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 15px;
        margin-bottom: 20px;
    }
    
    .detail-item {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .detail-icon {
        color: #d15858;
        width: 20px;
        text-align: center;
    }
    
    .reservation-actions {
        display: flex;
        gap: 10px;
        justify-content: flex-end;
    }
    
    .btn-action {
        padding: 8px 15px;
        border-radius: 8px;
        border: none;
        font-weight: 500;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .btn-detail {
        background-color: #f3a8a8;
        color: white;
    }
    
    .btn-detail:hover {
        background-color: #e69595;
    }
    
    .btn-cancel {
        background-color: #f8d7da;
        color: #721c24;
    }
    
    .btn-cancel:hover {
        background-color: #f5c6cb;
    }
    
    .btn-disabled {
        background-color: #e9ecef;
        color: #6c757d;
        cursor: not-allowed;
    }
    
    .empty-state {
        text-align: center;
        padding: 50px 20px;
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        background: linear-gradient(to bottom right, #fff, #ffecec);
    }
    
    .empty-icon {
        font-size: 50px;
        color: #d15858;
        margin-bottom: 20px;
    }
    
    .empty-state h4 {
        color: #b94444;
        margin-bottom: 10px;
    }
    
    .btn-primary {
        background-color: #d15858;
        border-color: #d15858;
    }
    
    .btn-primary:hover {
        background-color: #b94444;
        border-color: #b94444;
    }
    
    /* Modal Styling */
    .modal-content {
        border-radius: 15px;
        border: none;
        background: linear-gradient(to bottom right, #fff, #ffecec);
    }
    
    .modal-header {
        border-bottom: 1px solid #f3a8a8;
    }
    
    .modal-title {
        color: #b94444;
        font-weight: bold;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .reservation-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
        
        .reservation-actions {
            justify-content: flex-start;
            margin-top: 15px;
        }
        
        .reservation-details {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="reservation-container">
    <!-- Header -->
    <div class="header-section fade-in">
        <h2><i class="fas fa-calendar-alt me-2"></i>Daftar Reservasi</h2>
        <p class="text-muted">Lihat dan kelola semua reservasi Anda</p>
    </div>
    
    <!-- Filter Section -->
    <div class="box fade-in" style="animation-delay: 0.2s">
        <div class="row">
            <div class="col-md-6 mb-3 mb-md-0">
                <input type="text" class="form-control" id="searchInput" placeholder="Cari reservasi...">
            </div>
            <div class="col-md-3 mb-3 mb-md-0">
                <select class="form-select" id="statusFilter">
                    <option value="all">Semua Status</option>
                    <option value="menunggu">Menunggu</option>
                    <option value="dikonfirmasi">Dikonfirmasi</option>
                    <option value="selesai">Selesai</option>
                    <option value="dibatalkan">Dibatalkan</option>
                </select>
            </div>
            <div class="col-md-3">
                <a href="/reservasi" class="btn btn-primary w-100">
                    <i class="fas fa-plus me-2"></i>Reservasi Baru
                </a>
            </div>
        </div>
    </div>
    
    <!-- Daftar Reservasi -->
    <div id="reservationList">
        <?php if (count($reservations) > 0): ?>
            <?php foreach ($reservations as $index => $reservation): ?>
                <div class="reservation-card fade-in" style="animation-delay: <?= 0.3 + ($index * 0.1) ?>s" 
                     data-status="<?= $reservation['status'] ?>">
                    <div class="reservation-header">
                        <h3 class="reservation-title"><?= htmlspecialchars($reservation['kode_booking']) ?></h3>
                        <span class="reservation-status status-<?= $reservation['status'] ?>">
                            <?= ucfirst($reservation['status']) ?>
                        </span>
                    </div>
                    
                    <div class="reservation-details">
                        <div class="detail-item">
                            <i class="fas fa-store detail-icon"></i>
                            <span><?= htmlspecialchars($reservation['nama_outlet']) ?></span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-calendar-day detail-icon"></i>
                            <span><?= date('d M Y', strtotime($reservation['tanggal'])) ?></span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-clock detail-icon"></i>
                            <span><?= substr($reservation['jam_mulai'], 0, 5) ?> - <?= substr($reservation['jam_selesai'], 0, 5) ?></span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-users detail-icon"></i>
                            <span><?= $reservation['jumlah_orang'] ?> Orang</span>
                        </div>
                    </div>
                    
                    <div class="reservation-actions">
                        <button class="btn-action btn-detail" onclick="viewDetail(<?= $reservation['id'] ?>)">
                            <i class="fas fa-eye me-1"></i> Detail
                        </button>
                        
                        <?php if ($reservation['status'] == 'menunggu' || $reservation['status'] == 'dikonfirmasi'): ?>
                            <form method="post" style="margin:0;">
                                <input type="hidden" name="reservation_id" value="<?= $reservation['id'] ?>">
                                <button type="submit" name="cancel_reservation" class="btn-action btn-cancel" 
                                        onclick="return confirm('Apakah Anda yakin ingin membatalkan reservasi ini?')">
                                    <i class="fas fa-times me-1"></i> Batalkan
                                </button>
                            </form>
                        <?php else: ?>
                            <button class="btn-action btn-disabled" disabled>
                                <i class="fas fa-times me-1"></i> Batalkan
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="empty-state fade-in" style="animation-delay: 0.3s">
                <div class="empty-icon">
                    <i class="far fa-calendar-times"></i>
                </div>
                <h4>Belum Ada Reservasi</h4>
                <p class="text-muted">Anda belum memiliki reservasi. Mulailah dengan membuat reservasi baru.</p>
                <a href="/reservasi" class="btn btn-primary mt-3">
                    <i class="fas fa-plus me-2"></i>Buat Reservasi Baru
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Modal Detail Reservasi -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Reservasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalDetailContent">
                <!-- Konten akan diisi oleh JavaScript -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="printReservationBtn">
                    <i class="fas fa-print me-1"></i> Cetak
                </button>
            </div>
        </div>
    </div>
</div>

<script>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6>Kode Booking</h6>
                            <p>${data.kode_booking}</p>
                        </div>
                        <div class="col-md-6">
                            <h6>Status</h6>
                            <p><span class="badge bg-${getStatusColor(data.status)}">${data.status}</span></p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6>Outlet</h6>
                            <p>${data.nama_outlet}</p>
                        </div>
                        <div class="col-md-6">
                            <h6>Tanggal & Waktu</h6>
                            <p>${formatDate(data.tanggal)} ${data.jam_mulai} - ${data.jam_selesai}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6>Jumlah Orang</h6>
                            <p>${data.jumlah_orang} Orang</p>
                        </div>
                        <div class="col-md-6">
                            <h6>Meja</h6>
                            <p>${data.meja || '-'}</p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <h6>Catatan</h6>
                        <p>${data.catatan || 'Tidak ada catatan'}</p>
                    </div>
                `;
    }
<?php include PARTIALS_PATH . 'footer.php'; ?>