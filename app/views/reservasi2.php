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
$query = "SELECT r.*, o.nama_outlet 
          FROM reservasi r 
          JOIN outlet o ON r.outlet_id = o.id 
          WHERE r.user_id = ? 
          ORDER BY r.tanggal DESC, r.jam_mulai DESC";

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
    
    header("Location: /reservasi");
    exit;
}
?>

    
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
    }
</style>

<div class="reservation-container">
    <!-- Header -->
    <div class="header-section fade-in">
        <h2><i class="fas fa-calendar-alt me-2"></i>Daftar Reservasi</h2>
        <p class="text-muted">Lihat dan kelola semua reservasi Anda</p>
    </div>
    
    <!-- Filter Section -->
    <div class="filter-section fade-in" style="animation-delay: 0.2s">
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
                <a href="/buat-reservasi" class="btn btn-primary w-100">
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
                <a href="/buat-reservasi" class="btn btn-primary mt-3">
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
    // Fungsi untuk filter dan pencarian
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');
        const reservationCards = document.querySelectorAll('.reservation-card');
        
        function filterReservations() {
            const searchTerm = searchInput.value.toLowerCase();
            const statusValue = statusFilter.value;
            
            reservationCards.forEach(card => {
                const title = card.querySelector('.reservation-title').textContent.toLowerCase();
                const status = card.getAttribute('data-status');
                
                const matchesSearch = title.includes(searchTerm);
                const matchesStatus = statusValue === 'all' || status === statusValue;
                
                if (matchesSearch && matchesStatus) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
        
        searchInput.addEventListener('input', filterReservations);
        statusFilter.addEventListener('change', filterReservations);
    });
    
    // Fungsi untuk menampilkan detail reservasi
    function viewDetail(reservationId) {
        // Dalam implementasi nyata, ini akan mengambil data dari server via AJAX
        // Contoh sederhana:
        fetch(`/api/reservasi/detail?id=${reservationId}`)
            .then(response => response.json())
            .then(data => {
                const modalContent = document.getElementById('modalDetailContent');
                modalContent.innerHTML = `
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
                
                const modal = new bootstrap.Modal(document.getElementById('detailModal'));
                modal.show();
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Gagal memuat detail reservasi');
            });
    }
    
    function getStatusColor(status) {
        const colors = {
            'menunggu': 'warning',
            'dikonfirmasi': 'success',
            'selesai': 'info',
            'dibatalkan': 'danger'
        };
        return colors[status] || 'secondary';
    }
    
    function formatDate(dateString) {
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        return new Date(dateString).toLocaleDateString('id-ID', options);
    }
    
    // Fungsi cetak reservasi
    document.getElementById('printReservationBtn').addEventListener('click', function() {
        window.print();
    });
</script>

<?php include PARTIALS_PATH . 'footer.php'; ?>