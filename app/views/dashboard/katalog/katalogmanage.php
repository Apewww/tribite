<?php
session_start();
$pageTitle = "Katalog Management";
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; 
include PARTIALS_PATH . 'header.php';
include PARTIALS_PATH . 'validation_role.php';

$katalog = [];
if ($stmt = $conn->prepare("CALL GetKatalog()")) {
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $katalog[] = $row;
        }
    } else {
        $_SESSION['notif'] = ["Warn", "Katalog tidak ditemukan!"];
    }
    $stmt->close();
    $conn->next_result();
}

$kategori = [];
if ($stmt = $conn->prepare("CALL GetKategori()")) {
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $kategori[] = $row;
        }
    } else {
        $_SESSION['notif'] = ["Warn", "Kategori tidak ditemukan!"];
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
                  <div class="d-md-flex flex-md-column">
                    <button type="button" class="btn btn-primary w-100 w-md-auto mb-2" data-bs-toggle="modal" data-bs-target="#AddKategori" id="Add-Kategori">+ Tambah Kategori</button>
                    <button type="button" class="btn btn-success w-100 w-md-auto mb-4" data-bs-toggle="modal" data-bs-target="#AddKatalog" id="Add-Katalog">+ Tambah Produk</button>
                  </div>
                </div>
                <table id="katalogTable" class="table nowrap w-100">
                        <thead>
                            <tr>
                                <th data-priority="1">Nama Produk</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Kategori</th>
                                <th>Rating</th>
                                <th>Status</th>
                                <th>Gambar</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($katalog as $row): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['nama']) ?></td>
                                    <td><?= htmlspecialchars($row['deskripsi'] ? $row['deskripsi'] : "None") ?></td>
                                    <td><?= $row['harga'] ?></td>
                                    <td>
                                      <?php
                                        foreach ($kategori as $rows) {
                                            if ($row['kategori_id'] == $rows['id']) {
                                                echo htmlspecialchars($rows['nama']);
                                                break;
                                            }
                                        }
                                      ?>
                                    </td>
                                    <td><?= $row['rating'] ?></td>
                                    <td><?= $row['status'] == "aktif" ? "Aktif" : "NonAktif"; ?></td>
                                    <td>
                                        <div class="d-inline d-md-flex justify-content-md-center gap-2">
                                            <!-- <img src="/tribite/assets/img/keranjang.jpg" class="img-fluid rounded img-katalog" alt="Gambar Produk"> -->
                                            <img src="<?= htmlspecialchars($row['gambar']) ?>" class="img-fluid rounded img-katalog" alt="Gambar Produk">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-inline d-md-flex gap-2">
                                            <!-- <button class="btn btn-primary">Edit</button> -->
                                              <button type="button" class="btn btn-primary" 
                                                data-id="<?= $row['id'] ?>" 
                                                data-nama="<?= htmlspecialchars($row['nama']) ?>" 
                                                data-deskripsi="<?= htmlspecialchars($row['deskripsi']) ?>" 
                                                data-harga="<?= $row['harga'] ?>" 
                                                data-kategori="<?= $row['kategori_id'] ?>" 
                                                data-status="<?= $row['status'] ?>" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#EditKatalog" 
                                                id="edit-katalog">
                                                Edit
                                              </button>
                                              <form action="/katalogmanage/katalog_delete" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin hapus akun ini?')">
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

        <div class="modal fade" id="AddKategori" tabindex="-1" aria-labelledby="AddKategori" aria-hidden="true">
          <div class="modal-dialog">
            <form method="POST" action="/katalogmanage/kategori_add">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="AddKategori">Tambah Kategori</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" name="nama" class="form-control" placeholder="Nama Kategori" value="" required>
                    </div>
                    <div class="mb-3">
                        <textarea name="deskripsi" class="form-control" placeholder="Deskripsi (Optional)"></textarea>
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

        <div class="modal fade" id="AddKatalog" tabindex="-1" aria-labelledby="AddKatalog" aria-hidden="true">
          <div class="modal-dialog">
            <form method="POST" action="/katalogmanage/katalog_add" enctype="multipart/form-data">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="AddKatalog">Tambah Katalog</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" name="nama" class="form-control" placeholder="Nama Menu" value="" required>
                    </div>
                    <div class="mb-3">
                        <textarea name="deskripsi" class="form-control" placeholder="Deskripsi (Optional)"></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="number" step="0.01" name="harga" class="form-control" placeholder="Harga" value="" required>
                    </div>
                    <div class="mb-3">
                        <select name="kategori" class="form-control" required>
                            <?php foreach ($kategori as $row): ?>
                                <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['nama']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <select name="status" class="form-control" required>
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">NonAktif</option>
                        </select>
                    </div>
                    <div class="mb-3">
                      <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*" required>
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

        <div class="modal fade" id="EditKatalog" tabindex="-1" aria-labelledby="EditKatalogLabel" aria-hidden="true">
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
                        <input type="number" step="0.01" name="harga" class="form-control" placeholder="Harga" id="data-harga" value="">
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
document.addEventListener('DOMContentLoaded', function () {
  const editKatalogModal = document.getElementById('EditKatalog');
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
});
</script>


<?php
include PARTIALS_PATH . 'footer.php'; 
?> 
