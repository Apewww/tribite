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
                <table id="myTable" class="table table-striped table-bordered nowrap w-100">
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
                            <tr>
                                <td>Christy Chriselle</td>
                                <td>christychriselle@example.com</td>
                                <td>Admin</td>
                                <td>Aktif</td>
                                <td>
                                    <div class="d-inline d-md-flex justify-content-md-center gap-2">
                                        <button class="btn btn-primary">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Christy Chriselle</td>
                                <td>christychriselle@example.com</td>
                                <td>Admin</td>
                                <td>Aktif</td>
                                <td>
                                    <div class="d-inline d-md-flex justify-content-md-center gap-2">
                                        <button class="btn btn-primary">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Christy Chriselle</td>
                                <td>christychriselle@example.com</td>
                                <td>Admin</td>
                                <td>Aktif</td>
                                <td>
                                    <div class="d-inline d-md-flex justify-content-md-center gap-2">
                                        <button class="btn btn-primary">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>


<?php
include PARTIALS_PATH . 'footer.php';
?> 
