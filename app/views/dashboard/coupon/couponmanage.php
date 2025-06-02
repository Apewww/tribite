<?php
$pageTitle = "Kupon Management";
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; 
include PARTIALS_PATH . 'header.php';
session_start();


if (!isset($_SESSION['user']['nama'])) {
    header('Location: /login');
    exit;
}

$username = $_SESSION['user']['nama'];

$kupon = [];
if ($stmt = $conn->prepare("CALL GetKupon()")) {
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $kupon[] = $row;
        }
    } else {
        $_SESSION['notif'] = ["Warn", "Kupon tidak ditemukan!"];
    }
    $stmt->close();
    $conn->next_result();
}

$conn->close();

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

<div class="container-fluid">
    <div class="row">
        <?php include PARTIALS_PATH . 'sidebar.php'; ?>
        
        <div class="col">
            <div class="container mt-4">
                <div class="d-flex flex-column flex-md-row justify-content-md-between justify-content-center align-items-center">
                  <div class="text-center text-md-start">
                    <h3>Katalog Management</h3>
                    <p>Halaman pengelolaan katalog.</p>
                  </div>
                  <button type="button" class="btn btn-success w-100 w-md-auto mb-4" data-bs-toggle="modal" data-bs-target="#AddKupon" id="Add-Kupon">+ Tambah Kupon</button>
                </div>
                <table id="kuponTable" class="table nowrap w-100">
                        <thead>
                            <tr>
                                <th data-priority="1">Kode</th>
                                <th>Deskripsi</th>
                                <th>Tipe Kupon</th>
                                <th>Nilai Kupon</th>
                                <th>Min.Belanja</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Berakhir</th>
                                <th>Status</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kupon as $row): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['kode']) ?></td>
                                    <td><?= htmlspecialchars($row['deskripsi'] ? $row['deskripsi'] : "None") ?></td>
                                    <td><?= $row['tipe_diskon'] ?></td>
                                    <td><?= $row['nilai_diskon'] ?></td>
                                    <td><?= $row['minimal_belanja'] ?></td>
                                    <td><?= $row['tanggal_mulai'] ?></td>
                                    <td><?= $row['tanggal_berakhir'] ?></td>
                                    <td><?= $row['status'] == "aktif" ? "Aktif" : "NonAktif"; ?></td>
                                    <td>
                                        <div class="d-inline d-md-flex justify-content-md-center gap-2">
                                            <!-- <button class="btn btn-primary">Edit</button> -->
                                             <button type="button" class="btn btn-primary" data-id="<?= $row['id'] ?>" 
                                              data-kode="<?= htmlspecialchars($row['kode']) ?>" 
                                              data-deskripsi="<?= htmlspecialchars($row['deskripsi']) ?>" 
                                              data-tipe_diskon="<?= $row['tipe_diskon'] ?>" 
                                              data-nilai_diskon="<?= $row['nilai_diskon'] ?>" 
                                              data-minimal_belanja="<?= $row['minimal_belanja'] ?>" 
                                              data-tanggal_mulai="<?= $row['tanggal_mulai'] ?>" 
                                              data-tanggal_berakhir="<?= $row['tanggal_berakhir'] ?>" 
                                              data-status="<?= $row['status'] ?>" 
                                              data-bs-toggle="modal" 
                                              data-bs-target="#EditKatalog" id="edit-katalog">
                                              Edit
                                            </button>
                                            <form action="/couponmanage/coupon_delete" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin hapus akun ini?')">
                                              <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                              <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
            </div>
        </div>

        <div class="modal fade" id="AddKupon" tabindex="-1" aria-labelledby="AddKupon" aria-hidden="true">
          <div class="modal-dialog">
            <form method="POST" action="/couponmanage/coupon_add" enctype="multipart/form-data">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="AddKupon">Tambah Kupon</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" name="kode" class="form-control" placeholder="Kode" value="" required>
                    </div>
                    <div class="mb-3">
                        <textarea name="deskripsi" class="form-control" placeholder="Deskripsi (Optional)"></textarea>
                    </div>
                    <div class="mb-3">
                        <select name="tipe_diskon" class="form-control" required>
                            <option value="persen">Persen</option>
                            <option value="nominal">Nominal</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="number" step="0.01" name="nilai_diskon" class="form-control" placeholder="Nilai Diskon" value="" required>
                    </div>
                    <div class="mb-3">
                        <input type="number" step="0.01" name="minimal_belanja" class="form-control" placeholder="Minimal Belanja" value="" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" min="<?= date('Y-m-d') ?>" class="form-control" placeholder="Tanggal Mulai" value="" required>
                    </div>
                    <div class="mb-3">
                      <label for="tanggal_berakhir" class="form-label">Tanggal Berakhir</label>
                        <input type="date" name="tanggal_berakhir" min="<?= date('Y-m-d') ?>" class="form-control" placeholder="Tanggal Berakhir" value="" required>
                    </div>
                    <div class="mb-3">
                        <select name="status" class="form-control" required>
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">NonAktif</option>
                        </select>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                  </div>
                </div>
            </form>
          </div>
        </div>

        <div class="modal fade" id="EditKupon" tabindex="-1" aria-labelledby="EditKuponLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form method="POST" action="/katalogmanage/katalog_edit" enctype="multipart/form-data">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="EditKatalog">Edit Katalog</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="id" id="data-id">
                    <div class="mb-3">
                        <input type="text" name="nama" class="form-control" placeholder="Nama Menu" id="data-nama" value="">
                    </div>
                    <div class="mb-3">
                        <textarea name="deskripsi" class="form-control" placeholder="Deskripsi (Optional)" id="data-deskripsi"></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="number" name="harga" class="form-control" placeholder="Harga" id="data-harga" value="">
                    </div>
                    <div class="mb-3">
                        <select name="kategori" class="form-control" id="data-kategori">
                            <?php foreach ($kategori as $row): ?>
                                <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['nama']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <select name="status" class="form-control" id="data-status">
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">NonAktif</option>
                        </select>
                    </div>
                    <div class="mb-3">
                      <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                  </div>
                </div>
            </form>
          </div>
        </div>
    </div>
</div>
<script>

const editKatalogModal = document.getElementById('EditKupon');
editKatalogModal.addEventListener('show.bs.modal', function (event) {
  const button = event.relatedTarget;
  const id = button.getAttribute('data-id');
  const nama = button.getAttribute('data-nama');
  const deskripsi = button.getAttribute('data-deskripsi');
  const harga = button.getAttribute('data-harga');
  const kategori = button.getAttribute('data-kategori');
  const status = button.getAttribute('data-status');
  this.querySelector('#data-id').value = id || '';
  this.querySelector('#data-nama').value = nama || '';
  this.querySelector('#data-deskripsi').value = deskripsi || '';
  this.querySelector('#data-harga').value = harga || '';
  this.querySelector('#data-kategori').value = kategori || '';
  this.querySelector('#data-status').value = status || '';
});

</script>

<?php
include PARTIALS_PATH . 'footer.php'; 
?> 
