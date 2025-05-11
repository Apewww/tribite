<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php'; // Memanggil Config
include PARTIALS_PATH . 'header.php'; // Memanggil Header
// echo "Requested URI: " . $uri;

?>


<div class="container-fluid">
    <div class="row">
        <!-- Sidebar tetap di-load di sini, tapi posisinya fixed -->
        <?php include PARTIALS_PATH . 'sidebar.php'; ?>
        
        <!-- Konten utama -->
        <div class="col py-3 content-margin">
            <h1>Akun Management</h1>
            <p>Halaman pengelolaan akun pengguna.</p>
<div class="container mt-4">
    <table id="myTable" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Andi</td>
                <td>andi@example.com</td>
                <td>Admin</td>
                <td>Aktif</td>
            </tr>
            <!-- Tambahkan baris lainnya -->
        </tbody>
    </table>
</div>

        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>



<?php
include PARTIALS_PATH . 'footer.php'; // Memanggil Footer
?> 
