<?php
$pageTitle = "Akun Management";
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; 
include PARTIALS_PATH . 'header.php';


session_start();
if ($_SESSION['user']['nama']) {
    $username = $_SESSION['user']['nama'];
} else {
    header('Location: /login');
    exit;
}
// print_r($_SESSION['user']);
$stmt = $conn->prepare("CALL GetAkun");
$stmt->execute();
$result = $stmt->get_result();
$akun = [];
if ($result->num_rows >= 1) {
    while ($row = $result->fetch_assoc()) {
        $akun[] = $row;
    }
} else {
    $_SESSION['notif'] = ["Warn", "Akun tidak ditemukan!"];
}
$stmt->close();
$conn->close();

// echo '<pre>';
// print_r($akun);
// echo '</pre>';
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
                    <h3>Akun Management</h3>
                    <p>Halaman pengelolaan akun.</p>
                  </div>
                </div>
                <table id="akunTable" class="table nowrap w-100">
                        <thead>
                            <tr>
                                <th data-priority="1">Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($akun as $row): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['nama']) ?></td>
                                    <td><?= htmlspecialchars($row['email']) ?></td>
                                    <td><?= $row['role'] ? 'Admin' : 'User' ?></td>
                                    <td><?= $row['status'] ? 'Aktif' : 'Nonaktif' ?></td>
                                    <td>
                                        <div class="d-inline d-md-flex justify-content-md-center gap-2">
                                            <button type="button" class="btn btn-primary" 
                                              data-id="<?= $row['id'] ?>" 
                                              data-nama="<?= htmlspecialchars($row['nama']) ?>" 
                                              data-email="<?= htmlspecialchars($row['email']) ?>" 
                                              data-role="<?= $row['role'] ?>" data-bs-toggle="modal" 
                                              data-bs-target="#EditAkun" id="edit-akun">
                                              Edit
                                            </button>
                                            <!-- <a href="/akun/edit.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a> -->
                                            <form action="/akun/akun_delete" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin hapus akun ini?')">
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
        <div class="modal fade" id="EditAkun" tabindex="-1" aria-labelledby="AkunEditModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form method="POST" action="/akun/akun_edit">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="EditAkun">Edit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="id" id="data-id">
                    <div class="mb-3">
                        <input type="text" name="nama" class="form-control" placeholder="Nama" id="data-nama" value="">
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" id="data-email">
                    </div>
                    <div class="mb-3">
                        <select name="role" class="form-control" id="data-role">
                            <option value="0">User</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
            </form>
          </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const editAkunModal = document.getElementById('EditAkun');
  editAkunModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const id = button.getAttribute('data-id');
    const nama = button.getAttribute('data-nama');
    const email = button.getAttribute('data-email');
    const role = button.getAttribute('data-role');
    this.querySelector('#data-id').value = id || '';
    this.querySelector('#data-nama').value = nama || '';
    this.querySelector('#data-email').value = email || '';
    this.querySelector('#data-role').value = role || '';
  });
});
</script>

<?php
include PARTIALS_PATH . 'footer.php';
?> 
