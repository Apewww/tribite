<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/tribite/config.php';
include PARTIALS_PATH . 'header.php'; 
// echo "Requested URI: " . $uri;

?>


<div class="container-fluid">
    <div class="row">
        <?php include PARTIALS_PATH . 'sidebar.php'; ?>
        
        <div class="col">
            <div class="container mt-4">
                <h1>Akun Management</h1>
                <p>Halaman pengelolaan akun pengguna.</p>
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped table-bordered nowrap w-100">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Christy Chriselle</td>
                                <td>christychriselle@example.com</td>
                                <td>Admin</td>
                                <td>Aktif</td>
                                <td class="d-flex justify-content-center gap-1">
                                    <button class="btn btn-primary">Edit</button>
                                    <button class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Christy Chriselle</td>
                                <td>christychriselle@example.com</td>
                                <td>Admin</td>
                                <td>Aktif</td>
                                <td class="d-flex justify-content-center gap-1">
                                    <button class="btn btn-primary">Edit</button>
                                    <button class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Christy Chriselle</td>
                                <td>christychriselle@example.com</td>
                                <td>Admin</td>
                                <td>Aktif</td>
                                <td class="d-flex justify-content-center gap-md-1">
                                    <button class="btn btn-primary">Edit</button>
                                    <button class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include PARTIALS_PATH . 'footer.php';
?> 
